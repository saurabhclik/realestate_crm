@php
    $selectedStatus = $selectedStatus ?? 'today';
    $hasMoreInitial = $hasMoreInitial ?? false;
@endphp
<!-- <button class="back-button text-decoration-none" id="backButton" onclick="window.history.back()">
    <i class="fas fa-arrow-left"></i>
</button> -->

<div class="mb-5">
    <div class="status-filter-section mb-3 mt-3">
        <div class="status-filter-header d-flex justify-content-between align-items-center px-3 py-2">
            <h4 class="mb-0">Activities</h4>
        </div>
        <div class="status-filter-buttons d-flex flex-wrap gap-1 p-2">
            <button class="status-filter-btn {{ $selectedStatus === 'today' ? 'active' : '' }}" data-status="today">Today</button>
            <button class="status-filter-btn {{ $selectedStatus === 'tomorrow' ? 'active' : '' }}" data-status="tomorrow">Tomorrow</button>
            <button class="status-filter-btn {{ $selectedStatus === 'missed' ? 'active' : '' }}" data-status="missed">Missed</button>
        </div>
    </div>
    <div class="notification-container" id="notificationContainer"></div>
    <div class="loader-container text-center py-3" id="loader">
        <div class="spinner-border text-primary" role="status"></div>
        <p class="mt-2">Loading more activities...</p>
    </div>
    <div class="no-more text-center py-3 text-muted" id="noMore" style="display: none;">
        <p>No activities found</p>
    </div>
</div>

@include('mobile.modals.status')

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>
    .status-filter-section 
    {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .status-filter-header h4 
    {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
    }
    .status-filter-buttons 
    {
        background: #f8f9fa;
        border-radius: 8px;
    }
    .status-filter-btn 
    {
        background: #fff;
        border: 1px solid #dee2e6;
        color: #3762b8;
        font-size: 0.9rem;
        font-weight: 500;
        border-radius: 20px;
        padding: 6px 14px;
        transition: all .2s ease;
    }
    .status-filter-btn:hover 
    {
        background: #e9ecef;
    }
    .status-filter-btn.active 
    {
        background: #3762b8;
        color: #fff;
        font-weight: 600;
    }

    .notification-card 
    {
        background: #fff;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        font-size: 0.9rem;
    }
    .notification-header 
    {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }
    .notification-header strong 
    {
        font-size: 1rem;
        color: #333;
    }
    .notification-time 
    {
        font-size: 0.8rem;
        color: #6c757d;
    }
    .notification-meta-grid 
    {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 6px 12px;
        margin-top: 10px;
    }
    .meta-item { font-size: 0.85rem; }
    .meta-label { color: #6c757d; font-weight: 500; }
    .meta-value { color: #333; }

    .notification-actions 
    {
        display: flex;
        gap: 10px;
        margin-top: 12px;
    }
    .notification-footer 
    {
        margin-top: 8px;
        text-align: right;
    }

    .view-comment-btn 
    {
        font-size: 0.85rem;
        color: #3762b8;
        text-decoration: none;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() 
{
    const notificationContainer = document.getElementById('notificationContainer');
    const loader = document.getElementById('loader');
    const noMore = document.getElementById('noMore');
    const statusFilterButtons = document.querySelectorAll('.status-filter-btn');
    const statusModal = document.getElementById('statusModal');
    const statusUpdateForm = document.getElementById('statusUpdateForm');
    const statusSelect = document.getElementById('statusSelect');
    const reminderFields = document.getElementById('reminderFields');
    const conversionFields = document.getElementById('conversionFields');
    
    let currentPage = 1;
    let isLoading = false;
    let hasMore = true;
    let totalFetched = 0;
    let totalCount = {{ $totalCount ?? 0 }};
    let currentStatus = 'today'; // Default to 'today'
    
    // Set active button to 'today' by default
    document.querySelectorAll('.status-filter-btn').forEach(btn => {
        if(btn.getAttribute('data-status') === 'today') {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });
    
    // Initial notifications from PHP
    const initialNotifications = @json($initialNotifications ?? []);
    
    if (statusSelect) 
    {
        statusSelect.addEventListener('change', function() 
        {
            const selectedStatus = this.value;
            const showReminderFields = ['CALL SCHEDULED', 'VISIT SCHEDULED', 'MEETING SCHEDULED', 'FOLLOW UP'].includes(selectedStatus);
            if (reminderFields) reminderFields.style.display = showReminderFields ? 'block' : 'none';
            
            const showConversionFields = selectedStatus === 'CONVERTED';
            if (conversionFields) conversionFields.style.display = showConversionFields ? 'block' : 'none';
        });
    }

    if (statusUpdateForm) 
    {
        statusUpdateForm.addEventListener('submit', function(e) 
        {
            e.preventDefault();
            updateLeadStatus();
        });
    }

    if (statusModal) 
    {
        statusModal.addEventListener('click', function(e) 
        {
            if (e.target === statusModal) 
            {
                statusModal.style.display = 'none';
            }
        });
    }

    document.getElementById('cancelStatusUpdate')?.addEventListener('click', function()
    {
        if (statusModal) statusModal.style.display = 'none';
    });

    // Filter button click handler
    statusFilterButtons.forEach(button => {
        button.addEventListener('click', function() 
        {
            const newStatus = this.getAttribute('data-status');
            statusFilterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            currentStatus = newStatus;
            resetList();
        });
    });

    // Get the scrollable container - the parent div with class 'mb-5' or dashboard
    let scrollContainer = document.querySelector('.dashboard');
    if (!scrollContainer || scrollContainer.scrollHeight <= scrollContainer.clientHeight) {
        scrollContainer = document.querySelector('.mb-5');
    }
    if (!scrollContainer) {
        scrollContainer = document.querySelector('main');
    }
    if (!scrollContainer) {
        scrollContainer = window;
    }
    
    // Scroll listener for infinite scroll
    function checkScrollAndLoad() {
        if (isLoading || !hasMore) return;
        
        let scrollTop, scrollHeight, clientHeight;
        
        if (scrollContainer === window) {
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            scrollHeight = document.documentElement.scrollHeight;
            clientHeight = window.innerHeight;
        } else {
            scrollTop = scrollContainer.scrollTop;
            scrollHeight = scrollContainer.scrollHeight;
            clientHeight = scrollContainer.clientHeight;
        }
        
        // Load more when user is 100px from bottom
        if (scrollTop + clientHeight >= scrollHeight - 100) {
            loadMore();
        }
    }
    
    if (scrollContainer !== window) {
        scrollContainer.addEventListener('scroll', debounce(checkScrollAndLoad, 200));
    } else {
        window.addEventListener('scroll', debounce(checkScrollAndLoad, 200));
    }

    function getFetchUrl() {
        let url = "{{ route('mobile.notifications') }}" + "?page=" + currentPage + "&status=" + currentStatus;
        return url;
    }

    function loadMore() 
    {
        if (isLoading || !hasMore) return;
        
        isLoading = true;
        if (loader) loader.style.display = 'block';
        if (noMore) noMore.style.display = 'none';

        fetch(getFetchUrl(), {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.notifications && data.notifications.length > 0) 
            {
                renderNotifications(data.notifications);
                totalFetched += data.notifications.length;
                currentPage = data.nextPage || currentPage + 1;
                hasMore = data.hasMore === true;
                totalCount = data.totalCount || totalCount;
                
                if (!hasMore || totalFetched >= totalCount) 
                {
                    if (noMore) noMore.style.display = 'block';
                    if (loader) loader.style.display = 'none';
                } 
                else 
                {
                    if (loader) loader.style.display = 'none';
                }
            } 
            else 
            {
                hasMore = false;
                if (noMore) noMore.style.display = 'block';
                if (loader) loader.style.display = 'none';
            }
            isLoading = false;
        })
        .catch((error) => {
            console.error('Error:', error);
            hasMore = false;
            if (noMore) noMore.style.display = 'block';
            if (loader) loader.style.display = 'none';
            isLoading = false;
            if (typeof toastr !== 'undefined') toastr.error('Error loading notifications');
        });
    }

    // Event delegation for dynamic buttons
    if (notificationContainer) {
        notificationContainer.addEventListener('click', function(e) 
        {
            if (e.target.classList.contains('view-comment-btn')) 
            {
                e.preventDefault();
                const card = e.target.closest('.lead-card');
                if (card) {
                    const fullComment = card.dataset.comment || '---';
                    const commentSpan = card.querySelector('.notification-comment .meta-value');
                    if (commentSpan) commentSpan.textContent = fullComment;
                }
            }
            if (e.target.classList.contains('update-status-btn') || e.target.closest('.update-status-btn')) 
            {
                const btn = e.target.classList.contains('update-status-btn') ? e.target : e.target.closest('.update-status-btn');
                const leadId = btn.getAttribute('data-lead-id');
                if (leadId) showStatusModal(leadId);
            }
        });
    }

    function renderNotifications(list) 
    {
        if (!notificationContainer) return;
        
        if (list.length === 0 && notificationContainer.children.length === 0) 
        {
            notificationContainer.innerHTML = `
                <div class="text-center py-3 text-muted">
                    <p>No notifications found</p>
                </div>`;
            return;
        }

        list.forEach(notif => {
            const shortComment = notif.last_comment
                ? (notif.last_comment.length > 50
                    ? notif.last_comment.substring(0, 50) + '... <a href="#" class="view-comment-btn">Read More</a>'
                    : notif.last_comment)
                : '---';

            const html = `
                <div class="lead-card mobile-card mb-3 p-3 rounded shadow-sm bg-white" 
                    data-id="${notif.id}" 
                    data-lead-id="${notif.lead_id}"
                    data-comment="${notif.last_comment || '---'}">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="fw-bold mb-1">${escapeHtml(notif.name || 'Lead Notification')}</h6>
                            <small class="text-muted">
                                <i class="fas fa-phone me-1"></i> ${escapeHtml(notif.phone || '---')}
                            </small>
                        </div>
                        <div class="lead-actions">
                            <a href="https://wa.me/${escapeHtml(notif.phone || '')}" class="action-btn phone" target="_blank" rel="noopener noreferrer">
                                <i class="fas fa-phone text-light cust-size pt-2"></i>
                            </a>
                            <a href="https://wa.me/${escapeHtml(notif.phone || '')}" class="action-btn whatsapp" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-whatsapp text-light cust-size pt-2"></i>
                            </a>
                            <a class="action-btn update-status-btn" data-lead-id="${notif.id}">
                                <i class="fas fa-sync-alt text-light cust-size pt-2"></i>
                            </a>
                        </div>
                    </div>

                    <div class="lead-meta-grid mt-2">
                        <div class="meta-item">
                            <span class="meta-label">Status:</span>
                            <span class="meta-value">${escapeHtml(notif.status || '---')}</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Lead Date:</span>
                            <span class="meta-value">${formatDate(notif.lead_date)}</span>
                        </div>
                    </div>

                    <div class="mt-2 notification-comment">
                        <span class="fw-semibold">Last Comment:</span>
                        <span class="meta-value text-dark">
                            ${shortComment}
                        </span>
                    </div>
                    <div class="text-end mt-1">
                        <small class="text-muted">${formatDate(notif.created_at)}</small>
                    </div>
                </div>
            `;
            notificationContainer.insertAdjacentHTML('beforeend', html);
        });
    }
    
    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }

    function showStatusModal(leadId) 
    {
        if (!statusModal) return;
        if (statusSelect) statusSelect.value = '';
        const commentField = document.getElementById('statusComment');
        if (commentField) commentField.value = '';
        const remindDate = document.getElementById('remindDate');
        if (remindDate) remindDate.value = '';
        const remindTime = document.getElementById('remindTime');
        if (remindTime) remindTime.value = '';
        const conversionType = document.getElementById('conversionType');
        if (conversionType) conversionType.value = 'Completed';
        
        if (reminderFields) reminderFields.style.display = 'none';
        if (conversionFields) conversionFields.style.display = 'none';
        statusModal.setAttribute('data-lead-id', leadId);
        statusModal.style.display = 'flex';
    }

    function updateLeadStatus() 
    {
        if (!statusModal) return;
        const leadId = statusModal.getAttribute('data-lead-id');
        const status = statusSelect ? statusSelect.value : '';
        const comment = document.getElementById('statusComment')?.value || '';
        const remindDate = document.getElementById('remindDate')?.value || '';
        const remindTime = document.getElementById('remindTime')?.value || '';
        const conversionType = document.getElementById('conversionType')?.value || '';

        if (!status) 
        {
            if (typeof toastr !== 'undefined') toastr.error('Please select a status');
            return;
        }

        const requestData = {
            leadId: leadId,
            newStatus: status,
            comment: comment
        };

        if (remindDate && remindTime && (remindDate || remindTime)) 
        {
            requestData.remindDate = remindDate;
            requestData.remindTime = remindTime;
        }

        if (status === 'CONVERTED') 
        {
            requestData.conversionType = conversionType;
        }

        fetch("{{ route('mobile.update-lead-status') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(requestData)
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.success) 
            {
                if (typeof toastr !== 'undefined') toastr.success('Status updated successfully!');
                statusModal.style.display = 'none';
                resetList();
            } 
            else 
            {
                if (typeof toastr !== 'undefined') toastr.error('Error updating status: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            if (typeof toastr !== 'undefined') toastr.error('Error updating status: ' + error.message);
        });
    }

    function formatDate(dateStr) 
    {
        try 
        {
            if (!dateStr) return '---';
            const d = new Date(dateStr);
            if (isNaN(d.getTime())) return dateStr;
            return d.toLocaleDateString('en-US', { 
                year: 'numeric', month: 'short', day: 'numeric' 
            }) + ' ' + d.toLocaleTimeString([], { 
                hour: '2-digit', minute: '2-digit' 
            });
        } 
        catch 
        {
            return '---';
        }
    }

    function debounce(func, wait) 
    {
        let timeout;
        return function(...args) 
        {
            clearTimeout(timeout);
            timeout = setTimeout(() => func(...args), wait);
        };
    }

    function resetList() 
    {
        currentPage = 1;
        totalFetched = 0;
        hasMore = true;
        if (notificationContainer) notificationContainer.innerHTML = '';
        if (noMore) noMore.style.display = 'none';
        loadMore();
    }

    // Initial load - show today's activities by default
    if (initialNotifications && initialNotifications.length > 0) 
    {
        renderNotifications(initialNotifications);
        totalFetched = initialNotifications.length;
        if (loader) loader.style.display = 'none';
        // Check if more to load
        if (totalFetched >= (totalCount || 0)) {
            hasMore = false;
            if (noMore) noMore.style.display = 'block';
        }
    } 
    else 
    {
        // Load from API if no initial data
        loadMore();
    }
});
</script>