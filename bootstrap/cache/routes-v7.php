<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JXK00amhzg63VzeS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/software/info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yFVduUvq0at9dKgO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/software/update-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wPd0CQRpxCEfTCJw',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/software' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BwzlAMn8ENidbTi0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ggyUDTUYsT5WS84A',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/features' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::061LpUHdHvKx5S1d',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::avrzNjh70I4jCqFX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/trials' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HFOzesM5nlPkKnqq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TNvsncyhsu1wVGAy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/faqs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DMQhJ8gOvTY0SD4T',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3wO8OlLuE2grK5SL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/advertisements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::q1hb9GCDtypsAW7i',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zI63rQ4o8h0X8oEC',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/support/tickets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OkoqPqlFN6kIb3m1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KSZUIDOiaY8bnzPK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/submit-inquiry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'submit.inquiry',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.login.form',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/save-token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ar6fTufSK5NBY4d6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/dashboard-charts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.dashboard-charts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/attendance/mark' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.attendance.mark',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/new-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.new-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/transfer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.transfer',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/allocated-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.allocated-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/pending-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.pending-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/processing-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.processing-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/interested-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.interested-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/not-picked-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.not-picked-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/visit-done-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.visit-done-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/call-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.call-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/visit-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.visit-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/cancelled-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.cancelled-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/not-interested-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.not-interested-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/not-reachable-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.not-reachable-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/wrong-number-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.wrong-number-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/lost-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.lost-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/future-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.future-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/converted-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.converted-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/channel-partner-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.channel-partner-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/booked' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.booked',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/whatsapp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.whatsapp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/partially-complete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.partially-complete',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/all-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.all-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/completed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.completed',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/meeting-scheduled-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.meeting-scheduled-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/get-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.get-users',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/share-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.share-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/update-lead-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.update-lead-status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/leads/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.leads.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/create-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.create-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/quick-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.quick-leads',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/tasks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.tasks',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.task.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.notifications',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.user.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/profile/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mobile/attendance/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.attendance.status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/profile/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.update_profile',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/password/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.update_password',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/change/logo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.logo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/login/log' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.login_log',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/update/logo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.update_logo',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/settings/ratings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'settings.ratings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promote/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'promote.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/designation/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'designation.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/designation/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'designation.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/company/hierarchy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.hierarchy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/category/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/category/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/attendance-toggle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.toggle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-chart-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.chart-data',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/export-chart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.export-chart',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/analytics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.analytics',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/export-analytics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.export.analytics',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/permission/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/form/field' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'form.field',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'settings.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project.name',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/campaign' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'campaign',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/campaign/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'campaigns.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/source/platform' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'source.platform',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/source/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'source.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/check/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'check.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/checklist/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'checklist.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project.category',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project-category/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project_category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project/sub-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project.sub_category',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sub-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sub_category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attendance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inquiry-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inquiry_question',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inquiry-question/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inquiry-question.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inquiry-question/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inquiry-question.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/integration-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'integration.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'integration.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/integrations/facebook/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'integrations.facebook.status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.add',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/import/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.import.upload',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/all-lead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.all_lead',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/generate-share-link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.generate-share-link',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/update-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.updateStatus',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.index',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.import',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lead.import.process',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/import-preview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.import.preview',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/import-process' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.preview.import.process',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/allocate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.allocate',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/allocate/lead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.allocate_user',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/unallocated' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.unallocated',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/new' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.new',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/transfer-lead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.transfer_lead',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/transfer-history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.transfer_history',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.pending',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/processing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.processing',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/interested' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.interested',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/call-scheduled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.call_scheduled',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/meeting-scheduled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.meeting_scheduled',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/whatsapp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.whatsapp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/visit-scheduled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.visit_scheduled',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/visit-done' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.visit_done',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/booked' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.booked',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/completed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.completed',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/cancelled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.cancelled',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/future' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.future',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/transfer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.transfer',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/transfer-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'transfer_list.lead',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/lead/transfer-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.transfer_user',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/channel-partner' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.channel_partner',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/not-interested' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.not_interested',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/not-picked' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.not_picked',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/lost' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.lost',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/wrong-number' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.wrong_number',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/not-reachable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.not_reachable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/quick-lead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.quick_add',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/duplicate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.duplicate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/share' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.share',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/add-projects' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.add-projects',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/get-project-names' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.get-project-names',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/get-lead-projects' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.get-lead-projects',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/filter-lead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.filter',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead/revoke-share' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.revoke-share',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/check-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.check-type',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leads/filter-lead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leads.filter.leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/task/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/task/task-project-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.project.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project-details.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'project-details.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/project-details/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project-details.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/event' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/tracking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.tracking',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/timeline' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.timeline',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expense' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expense.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'expense.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expense/bulk-accept' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expense.bulk-accept',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/expense/bulk-reject' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expense.bulk-reject',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/dayend-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.dayend_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/talecaller-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.talecaller_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/salesman-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.salesman_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/campaign-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.campaign_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/source-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.source_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/classification-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.classification_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/project-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.project_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/category-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.category_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/sub-category-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.sub_category_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/city-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.city_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/state-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.state_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/address-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.address_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/interested-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.interested_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/visit-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.visit_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/call-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.call_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/call-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.call_details',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/smart-lead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.smart_lead',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/get-categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-categories',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/get-subcategories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-subcategories',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/get-cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-cities',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/log-call' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-call',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/task-report-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task-report-summary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/task-overdue-summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task-overdue-summary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/upcoming-tasks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'upcoming-tasks',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/task-completion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task-completion',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/project-wise-task' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project-wise-task',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/communication-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.communication_reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report/client-communications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.client_communications',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lead-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead-status.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lead-status.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/system-configuration' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'system-configuration.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/leads/toggle-pin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.toggle-pin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/integrations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'integrations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/integrations/housing/sync' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'integrations.housing.sync',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/integrations/facebook/sync' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'integrations.facebook.sync',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebook/token/exchange' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facebook.token.exchange',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebook/pages/fetch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facebook.pages.fetch',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebook/groups/fetch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facebook.group.fetch',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebook/campaigns/fetch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facebook.campaigns.fetch',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/notifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notifications.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/notifications/mark-all-read' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notifications.markAllRead',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/integration' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.integration',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.notification',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/setting/notification/mark-read' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.notification.mark_all_read',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/targets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.targets',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/targets/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.targets.save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/admin/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.admin.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/summary-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.summary-report',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/daily-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.daily-report',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/get-week-daily-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.get.week.daily.data',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/admin/update-daily-achieved' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.admin.update.daily.achieved',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/get-autoassign-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.get.autoassign.status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis-points' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.points',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis-points/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.points.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/premium-features' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'premium.features',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/premium-features/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'premium-features.request',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/premium-features/activate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'premium-features.activate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/start-free-trial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'start-free-trial',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/advertisement/deactivate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertisement.deactivate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/support-tickets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'support.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/post-sale' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inventory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inventory/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inventory/update-sale' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory.updateSale',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inventory/sale-history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory.saleHistory',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inventory/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory.import',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inventory/download-template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory.downloadTemplate',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/get-team-points' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.get.team.points',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/save-daily-entries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.save.daily.entries',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/get-daily-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.get.daily.data',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mis/get-week-number' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.get.week.number',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/exhibitions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messaging.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/send' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messaging.send',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/send-with-attachments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messaging.send.with-attachments',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/channels' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fmfRDsOd769JUS7t',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gzqHmo98YCFvJxOO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/exhibition/leads/details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6qn75fPAOL2iVRpa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/create-template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messaging.templates.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/store-template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messaging.templates.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/cleanup-temp-files' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messaging.cleanup-temp-files',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/data-center/data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/data-center/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/data-center/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/data-center/import/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.import.upload',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/property/share-whatsapp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.share-whatsapp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.name',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/properties/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/firebase-sw-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::thXd1Fbg6dgwLaPI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-storage-link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cyjE3Nge0rBb24Wn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clear-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XldTWQFzQ9UsOHhQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/refresh-storage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i17Cm9JVo5gutfFd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/a(?|pi/(?|s(?|oftware/([^/]++)(?|(*:41))|upport/(?|tickets/(?|([^/]++)(?|(*:81)|/(?|reopen(*:98)|messages(*:113)))|export(*:129))|messages/([^/]++)/read(*:160)))|f(?|eatures/([^/]++)(?|(*:193))|aqs/([^/]++)(?|(*:217)))|trials/([^/]++)(?|(*:245))|a(?|dvertisements/([^/]++)(?|(*:283))|pk/([^/]++)/(?|info(*:311)|upload(*:325)|d(?|elete(*:342)|ownload(*:357)))))|ttendance/(?|([^/]++)(*:390)|daily(*:403)|monthly(*:418)))|/r(?|e(?|set\\-password/([^/]++)(*:459)|port/(?|initiate\\-call/([^/]++)(*:498)|agent\\-call\\-details(?:/([^/]++))?(*:540)))|ole\\-permission/(?|([^/]++)(*:577)|store(*:590)|update/([^/]++)(*:613)|delete/([^/]++)(*:636))|ate/([^/]++)(*:657))|/lead(?|/(?|shared/([^/]++)(?|(*:696))|get\\-(?|c(?|ategories/([^/]++)(*:735)|ities/([^/]++)(*:757))|subcategories/([^/]++)(*:788))|edit/([^/]++)(*:810)|update/([^/]++)(*:833)|([^/]++)/(?|comments(*:861)|project\\-visits(*:884)|matching\\-properties(*:912)|refresh\\-matching(*:937)|details(*:952)))|\\-status/(?|([^/]++)(*:982)|sequence/([^/]++)(*:1007)|r(?|oles/([^/]++)(*:1033)|ename/([^/]++)(*:1056))|toggle/([^/]++)(*:1081)|([^/]++)(*:1098)))|/p(?|ro(?|ject(?|s/([^/]++)(*:1136)|/update/([^/]++)(*:1161)|\\-(?|category/update/([^/]++)(*:1199)|details/(?|([^/]++)(?|(*:1230)|/edit(*:1244)|(*:1253))|get\\-(?|categories/([^/]++)(*:1290)|subcategories/([^/]++)(*:1321))|remove\\-image(*:1344))))|mote/(?|show/([^/]++)(*:1377)|approved/([^/]++)(*:1403))|pert(?|y/([^/]++)/details(*:1438)|ies/([^/]++)(*:1459)))|ermission/(?|update/([^/]++)(*:1498)|delete/([^/]++)(*:1522))|ost\\-sale/(?|([^/]++)(?|/edit(*:1561)|(*:1570))|subcategories/([^/]++)(*:1602)|([^/]++)/(?|documents(*:1632)|upload\\-document(*:1657))|document/([^/]++)(*:1684)|lead/([^/]++)(*:1706)|rate\\-link(*:1725)))|/m(?|obile/(?|lead\\-edit/([^/]++)(*:1769)|update\\-lead/([^/]++)(*:1799)|tasks/(?|([^/]++)(?|(*:1828)|/complete(*:1846))|allocate(*:1864))|view\\-comments/([^/]++)(*:1897))|is\\-points/(?|update/([^/]++)(*:1936)|destroy/([^/]++)(*:1961))|essaging/(?|templates/([^/]++)(?|(*:2004)|/([^/]++)/preview(*:2030))|([^/]++)(?|/edit(*:2056)|(*:2065))))|/users/(?|([^/]++)(?|(*:2098)|/edit(*:2112)|(*:2121))|import(*:2137)|update\\-status(*:2160)|([^/]++)/check\\-delete(*:2191))|/d(?|esignation/update/([^/]++)(*:2232)|ata\\-center/(?|([^/]++)(?|/edit(*:2272)|(*:2281))|status/([^/]++)(*:2306)|([^/]++)(*:2323)|comments/([^/]++)(?|(*:2352))))|/c(?|a(?|tegory/update/([^/]++)(*:2395)|mpaign/update/([^/]++)(*:2426))|hecklist/update/([^/]++)(*:2460))|/s(?|ource/update/([^/]++)(*:2496)|u(?|b\\-category/([^/]++)(*:2529)|pport\\-tickets/([^/]++)(?|(*:2564)|/toggle(*:2580))))|/in(?|tegration(?|\\-settings/([^/]++)(?|(*:2632))|/auto\\-sync/([^/]++)(*:2662))|ventory/get\\-leads/([^/]++)(*:2699))|/get\\-project\\-name/([^/]++)(*:2737)|/task/(?|create(?:/([^/]++))?(*:2775)|store(?:/([^/]++))?(*:2803)|delete/([^/]++)(*:2827)|update\\-status/([^/]++)(*:2859)|project/(?|update(?|/([^/]++)(*:2897)|\\-status/([^/]++)(*:2923))|delete/([^/]++)(*:2948)))|/e(?|vent/comments/([^/]++)(*:2986)|x(?|pense/([^/]++)/(?|accept(*:3023)|reject(*:3038)|clear(*:3052)|images(*:3067))|hibition(?|s/(?|([^/]++)(?|(*:3104)|/(?|view(*:3121)|leads\\-page(*:3141)))|leads/([^/]++)(*:3166)|([^/]++)/leads(*:3189)|leads/([^/]++)(*:3212)|([^/]++)/(?|activate(*:3241)|store(*:3255)|([^/]++)(*:3272)|convert(*:3288))|convert\\-multiple(*:3315)|([^/]++)/(?|share/(?|create(*:3351)|links(*:3365))|leads/import(*:3387)|toggle\\-auto\\-welcome(*:3417)|get\\-details(*:3438)))|/(?|([^/]++)/message(*:3469)|share/([^/]++)(*:3492))|\\-share/([^/]++)/submit(*:3525)))))/?$}sDu',
    ),
    3 => 
    array (
      41 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gOVWLFA200RROFPs',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::smb3oBoS2xtT5LIp',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BUIJEFXaWwCXWHh0',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      81 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6pRlQw8PgCFtgE6R',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2B68gwFNZ9JA7Sum',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      98 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Up0K70MAbQvcoZg3',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      113 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::a3m4nFBvRGXWq8YC',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      129 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OUvqad3PSH31YsR1',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      160 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gyyC4mE74it0gqK9',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      193 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R7EjsKckkVX7yNQf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VEYjaqNe9wDBoRzq',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jy4v736WV3s9Du59',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r9eIPg7Su5O23J0S',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XSFbk7et1D9shlYI',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1Jmnqw7yzNkRoEIe',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      245 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c4Qu3oU91g6gOQVa',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JoC4ir0TcUV0B7GA',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RfBCZfIdLCo7vPT8',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      283 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Psi7qwx9HAJpDYyv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GX4vmpBNHNT82col',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PvS73ouwkhx6qL9j',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      311 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7ddSv1MrXTfDo8pQ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      325 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8pGib50vhZi9gI3A',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      342 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qFAbuDgz7wX7SeOX',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      357 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xhnKxuEEWHOlZCSM',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      390 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      403 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.daily',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      418 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.monthly',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      498 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'initiate-call',
          ),
          1 => 
          array (
            0 => 'lead',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      540 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.agent_call_details',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      577 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.form',
          ),
          1 => 
          array (
            0 => 'secret',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      590 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.store',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      613 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      636 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      657 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rate.form',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      696 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.shared-form',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lead.submit-shared-form',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      735 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oyEvey996Mg0vlwR',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cJ0W4fd37mdNBYvW',
          ),
          1 => 
          array (
            0 => 'state',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      788 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HET8eBtvs929s48a',
          ),
          1 => 
          array (
            0 => 'category_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      810 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      833 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      861 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'leads.comments',
          ),
          1 => 
          array (
            0 => 'lead',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      884 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.project-visits',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      912 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.matching-properties',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      937 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.refresh-matching',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      952 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead.details',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      982 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead-status.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1007 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead-status.update-sequence',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1033 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead-status.update-roles',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1056 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead-status.rename',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1081 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead-status.toggle',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1098 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lead-status.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1136 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project.public.show',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1161 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1199 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1230 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project-details.show',
          ),
          1 => 
          array (
            0 => 'project_detail',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project-details.edit',
          ),
          1 => 
          array (
            0 => 'project_detail',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1253 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project-details.update',
          ),
          1 => 
          array (
            0 => 'project_detail',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'project-details.destroy',
          ),
          1 => 
          array (
            0 => 'project_detail',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1290 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GMtSoxTzsUuOSoMT',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1321 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HnwnAP8jbt1OCJBh',
          ),
          1 => 
          array (
            0 => 'categoryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1344 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'project-details.remove_image',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1377 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'promote.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1403 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'promote.approved',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1438 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.details',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1498 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1522 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permission.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1561 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1570 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1602 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1632 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.generated::H0xwOpxd6C9zKkdf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1657 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.generated::p0H8gYAFz6yhbqni',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1684 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.generated::qnRuGag8hJ6eqiwH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1706 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.by-lead',
          ),
          1 => 
          array (
            0 => 'leadId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-sale.rate-link',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1769 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.leads.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1799 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.update-lead',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1828 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.task.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1846 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.task.complete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1864 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.task.allocate',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1897 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mobile.view-comments',
          ),
          1 => 
          array (
            0 => 'lead_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1936 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.points.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1961 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mis.points.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2004 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AB2dZx5HXsvIzNP8',
          ),
          1 => 
          array (
            0 => 'channel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2030 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LHcKqiLKQflOmKvz',
          ),
          1 => 
          array (
            0 => 'channel',
            1 => 'templateId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2056 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messaging.templates.edit',
          ),
          1 => 
          array (
            0 => 'template',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2065 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messaging.templates.update',
          ),
          1 => 
          array (
            0 => 'template',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'messaging.templates.destroy',
          ),
          1 => 
          array (
            0 => 'template',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2098 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2121 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2137 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.import',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2160 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.update-status',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2191 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.check_delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2232 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'designation.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2272 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2281 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2306 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.update-status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2352 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.comments',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'data-center.add-comment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2395 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.category',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2426 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'campaign.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2460 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'checklist.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2496 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'source.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2529 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sub_category.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.toggle',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2632 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'integration.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'integration.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2662 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'integration.auto-sync.update',
          ),
          1 => 
          array (
            0 => 'integrationType',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2699 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'inventory.getLeads',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2737 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xfGbyRYxFvXXxOUI',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2775 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.create',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2803 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.store',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2827 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2859 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.update.status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2897 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.project.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2923 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.project.update-status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2948 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'task.project.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2986 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'event.comments',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3023 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expense.accept',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3038 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expense.reject',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3052 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expense.clear',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3067 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'expense.images',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3104 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3121 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.view',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.leads.page',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3166 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.leads.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3189 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.leads',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3212 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.lead.details',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.activate',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.leads.store',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3272 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'exhibition_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3288 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.leads.convert',
          ),
          1 => 
          array (
            0 => 'lead',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3315 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.leads.convert.multiple',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3351 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.share.create',
          ),
          1 => 
          array (
            0 => 'exhibition',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3365 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.share.links',
          ),
          1 => 
          array (
            0 => 'exhibition',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3387 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.leads.import',
          ),
          1 => 
          array (
            0 => 'exhibition',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3417 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibitions.toggle-auto-welcome',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3438 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibitions.get-details',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3469 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.message',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3492 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.share.access',
          ),
          1 => 
          array (
            0 => 'shareCode',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3525 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'exhibition.share.submit',
          ),
          1 => 
          array (
            0 => 'shareCode',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JXK00amhzg63VzeS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:296:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:78:"function (\\Illuminate\\Http\\Request $request) 
{
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005370000000000000000";}";s:4:"hash";s:44:"e+2GZcU7Cd4C9hjK5CoQ9PqB9e/07jFe0eTH6uiBky4=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JXK00amhzg63VzeS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yFVduUvq0at9dKgO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/software/info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getSoftwareInfo',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getSoftwareInfo',
        'namespace' => NULL,
        'prefix' => 'api/software',
        'where' => 
        array (
        ),
        'as' => 'generated::yFVduUvq0at9dKgO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wPd0CQRpxCEfTCJw' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/software/update-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateSoftwareType',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateSoftwareType',
        'namespace' => NULL,
        'prefix' => 'api/software',
        'where' => 
        array (
        ),
        'as' => 'generated::wPd0CQRpxCEfTCJw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BwzlAMn8ENidbTi0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/software',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getSoftwareRequests',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getSoftwareRequests',
        'namespace' => NULL,
        'prefix' => 'api/software',
        'where' => 
        array (
        ),
        'as' => 'generated::BwzlAMn8ENidbTi0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gOVWLFA200RROFPs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/software/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getSoftwareRequest',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getSoftwareRequest',
        'namespace' => NULL,
        'prefix' => 'api/software',
        'where' => 
        array (
        ),
        'as' => 'generated::gOVWLFA200RROFPs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ggyUDTUYsT5WS84A' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/software',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createSoftwareRequest',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createSoftwareRequest',
        'namespace' => NULL,
        'prefix' => 'api/software',
        'where' => 
        array (
        ),
        'as' => 'generated::ggyUDTUYsT5WS84A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::smb3oBoS2xtT5LIp' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/software/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateSoftwareRequest',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateSoftwareRequest',
        'namespace' => NULL,
        'prefix' => 'api/software',
        'where' => 
        array (
        ),
        'as' => 'generated::smb3oBoS2xtT5LIp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BUIJEFXaWwCXWHh0' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/software/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteSoftwareRequest',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteSoftwareRequest',
        'namespace' => NULL,
        'prefix' => 'api/software',
        'where' => 
        array (
        ),
        'as' => 'generated::BUIJEFXaWwCXWHh0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::061LpUHdHvKx5S1d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/features',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getFeatures',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getFeatures',
        'namespace' => NULL,
        'prefix' => 'api/features',
        'where' => 
        array (
        ),
        'as' => 'generated::061LpUHdHvKx5S1d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::R7EjsKckkVX7yNQf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/features/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getFeature',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getFeature',
        'namespace' => NULL,
        'prefix' => 'api/features',
        'where' => 
        array (
        ),
        'as' => 'generated::R7EjsKckkVX7yNQf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::avrzNjh70I4jCqFX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/features',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createFeature',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createFeature',
        'namespace' => NULL,
        'prefix' => 'api/features',
        'where' => 
        array (
        ),
        'as' => 'generated::avrzNjh70I4jCqFX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VEYjaqNe9wDBoRzq' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/features/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateFeature',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateFeature',
        'namespace' => NULL,
        'prefix' => 'api/features',
        'where' => 
        array (
        ),
        'as' => 'generated::VEYjaqNe9wDBoRzq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jy4v736WV3s9Du59' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/features/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteFeature',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteFeature',
        'namespace' => NULL,
        'prefix' => 'api/features',
        'where' => 
        array (
        ),
        'as' => 'generated::jy4v736WV3s9Du59',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HFOzesM5nlPkKnqq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/trials',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getTrials',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getTrials',
        'namespace' => NULL,
        'prefix' => 'api/trials',
        'where' => 
        array (
        ),
        'as' => 'generated::HFOzesM5nlPkKnqq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::c4Qu3oU91g6gOQVa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/trials/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getTrial',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getTrial',
        'namespace' => NULL,
        'prefix' => 'api/trials',
        'where' => 
        array (
        ),
        'as' => 'generated::c4Qu3oU91g6gOQVa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TNvsncyhsu1wVGAy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/trials',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createTrial',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createTrial',
        'namespace' => NULL,
        'prefix' => 'api/trials',
        'where' => 
        array (
        ),
        'as' => 'generated::TNvsncyhsu1wVGAy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JoC4ir0TcUV0B7GA' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/trials/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateTrial',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateTrial',
        'namespace' => NULL,
        'prefix' => 'api/trials',
        'where' => 
        array (
        ),
        'as' => 'generated::JoC4ir0TcUV0B7GA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RfBCZfIdLCo7vPT8' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/trials/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteTrial',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteTrial',
        'namespace' => NULL,
        'prefix' => 'api/trials',
        'where' => 
        array (
        ),
        'as' => 'generated::RfBCZfIdLCo7vPT8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DMQhJ8gOvTY0SD4T' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/faqs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getFaqs',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getFaqs',
        'namespace' => NULL,
        'prefix' => 'api/faqs',
        'where' => 
        array (
        ),
        'as' => 'generated::DMQhJ8gOvTY0SD4T',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::r9eIPg7Su5O23J0S' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/faqs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getFaq',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getFaq',
        'namespace' => NULL,
        'prefix' => 'api/faqs',
        'where' => 
        array (
        ),
        'as' => 'generated::r9eIPg7Su5O23J0S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3wO8OlLuE2grK5SL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/faqs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createFaq',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createFaq',
        'namespace' => NULL,
        'prefix' => 'api/faqs',
        'where' => 
        array (
        ),
        'as' => 'generated::3wO8OlLuE2grK5SL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XSFbk7et1D9shlYI' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/faqs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateFaq',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateFaq',
        'namespace' => NULL,
        'prefix' => 'api/faqs',
        'where' => 
        array (
        ),
        'as' => 'generated::XSFbk7et1D9shlYI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1Jmnqw7yzNkRoEIe' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/faqs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteFaq',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteFaq',
        'namespace' => NULL,
        'prefix' => 'api/faqs',
        'where' => 
        array (
        ),
        'as' => 'generated::1Jmnqw7yzNkRoEIe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::q1hb9GCDtypsAW7i' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/advertisements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getAdvertisements',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getAdvertisements',
        'namespace' => NULL,
        'prefix' => 'api/advertisements',
        'where' => 
        array (
        ),
        'as' => 'generated::q1hb9GCDtypsAW7i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Psi7qwx9HAJpDYyv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/advertisements/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getAdvertisement',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getAdvertisement',
        'namespace' => NULL,
        'prefix' => 'api/advertisements',
        'where' => 
        array (
        ),
        'as' => 'generated::Psi7qwx9HAJpDYyv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zI63rQ4o8h0X8oEC' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/advertisements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createAdvertisement',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@createAdvertisement',
        'namespace' => NULL,
        'prefix' => 'api/advertisements',
        'where' => 
        array (
        ),
        'as' => 'generated::zI63rQ4o8h0X8oEC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GX4vmpBNHNT82col' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/advertisements/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateAdvertisement',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateAdvertisement',
        'namespace' => NULL,
        'prefix' => 'api/advertisements',
        'where' => 
        array (
        ),
        'as' => 'generated::GX4vmpBNHNT82col',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PvS73ouwkhx6qL9j' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/advertisements/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteAdvertisement',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteAdvertisement',
        'namespace' => NULL,
        'prefix' => 'api/advertisements',
        'where' => 
        array (
        ),
        'as' => 'generated::PvS73ouwkhx6qL9j',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OkoqPqlFN6kIb3m1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/support/tickets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getTickets',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getTickets',
        'namespace' => NULL,
        'prefix' => 'api/support',
        'where' => 
        array (
        ),
        'as' => 'generated::OkoqPqlFN6kIb3m1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6pRlQw8PgCFtgE6R' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/support/tickets/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getTicket',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getTicket',
        'namespace' => NULL,
        'prefix' => 'api/support',
        'where' => 
        array (
        ),
        'as' => 'generated::6pRlQw8PgCFtgE6R',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2B68gwFNZ9JA7Sum' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/support/tickets/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateTicket',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@updateTicket',
        'namespace' => NULL,
        'prefix' => 'api/support',
        'where' => 
        array (
        ),
        'as' => 'generated::2B68gwFNZ9JA7Sum',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Up0K70MAbQvcoZg3' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/support/tickets/{id}/reopen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@reopenTicket',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@reopenTicket',
        'namespace' => NULL,
        'prefix' => 'api/support',
        'where' => 
        array (
        ),
        'as' => 'generated::Up0K70MAbQvcoZg3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::a3m4nFBvRGXWq8YC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/support/tickets/{id}/messages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getMessages',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getMessages',
        'namespace' => NULL,
        'prefix' => 'api/support',
        'where' => 
        array (
        ),
        'as' => 'generated::a3m4nFBvRGXWq8YC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gyyC4mE74it0gqK9' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/support/messages/{id}/read',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@markMessageRead',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@markMessageRead',
        'namespace' => NULL,
        'prefix' => 'api/support',
        'where' => 
        array (
        ),
        'as' => 'generated::gyyC4mE74it0gqK9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OUvqad3PSH31YsR1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/support/tickets/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@exportTickets',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@exportTickets',
        'namespace' => NULL,
        'prefix' => 'api/support',
        'where' => 
        array (
        ),
        'as' => 'generated::OUvqad3PSH31YsR1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7ddSv1MrXTfDo8pQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/apk/{id}/info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getApkInfo',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@getApkInfo',
        'namespace' => NULL,
        'prefix' => 'api/apk',
        'where' => 
        array (
        ),
        'as' => 'generated::7ddSv1MrXTfDo8pQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8pGib50vhZi9gI3A' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/apk/{id}/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@uploadApk',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@uploadApk',
        'namespace' => NULL,
        'prefix' => 'api/apk',
        'where' => 
        array (
        ),
        'as' => 'generated::8pGib50vhZi9gI3A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qFAbuDgz7wX7SeOX' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/apk/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteApk',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@deleteApk',
        'namespace' => NULL,
        'prefix' => 'api/apk',
        'where' => 
        array (
        ),
        'as' => 'generated::qFAbuDgz7wX7SeOX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xhnKxuEEWHOlZCSM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/apk/{id}/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@downloadApk',
        'controller' => 'App\\Http\\Controllers\\API\\SoftwareFeatureController@downloadApk',
        'namespace' => NULL,
        'prefix' => 'api/apk',
        'where' => 
        array (
        ),
        'as' => 'generated::xhnKxuEEWHOlZCSM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KSZUIDOiaY8bnzPK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthenticateController@show_login',
        'controller' => 'App\\Http\\Controllers\\AuthenticateController@show_login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::KSZUIDOiaY8bnzPK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthenticateController@login',
        'controller' => 'App\\Http\\Controllers\\AuthenticateController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthenticateController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthenticateController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthenticateController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\AuthenticateController@sendResetLinkEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-password/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthenticateController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\AuthenticateController@showResetForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthenticateController@reset',
        'controller' => 'App\\Http\\Controllers\\AuthenticateController@reset',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.shared-form' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/shared/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@showSharedLeadForm',
        'controller' => 'App\\Http\\Controllers\\LeadController@showSharedLeadForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'lead.shared-form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.submit-shared-form' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/shared/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@submitSharedLeadForm',
        'controller' => 'App\\Http\\Controllers\\LeadController@submitSharedLeadForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'lead.submit-shared-form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'submit.inquiry' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'submit-inquiry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@submitInquiry',
        'controller' => 'App\\Http\\Controllers\\LeadController@submitInquiry',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'submit.inquiry',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oyEvey996Mg0vlwR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/get-categories/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getCategories',
        'controller' => 'App\\Http\\Controllers\\LeadController@getCategories',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::oyEvey996Mg0vlwR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HET8eBtvs929s48a' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/get-subcategories/{category_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getSubCategories',
        'controller' => 'App\\Http\\Controllers\\LeadController@getSubCategories',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HET8eBtvs929s48a',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cJ0W4fd37mdNBYvW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/get-cities/{state}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getCities',
        'controller' => 'App\\Http\\Controllers\\LeadController@getCities',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::cJ0W4fd37mdNBYvW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project.public.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projects/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@showPublic',
        'controller' => 'App\\Http\\Controllers\\ProjectController@showPublic',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'project.public.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.login.form' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\AuthController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Mobile\\AuthController@showLoginForm',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.login.form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Mobile\\AuthController@login',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ar6fTufSK5NBY4d6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/save-token',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\AuthController@saveFcmToken',
        'controller' => 'App\\Http\\Controllers\\Mobile\\AuthController@saveFcmToken',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'generated::Ar6fTufSK5NBY4d6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Mobile\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\AuthController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Mobile\\AuthController@dashboard',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.dashboard-charts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/dashboard-charts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@getChartData',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@getChartData',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.dashboard-charts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.attendance.mark' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/attendance/mark',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@markAttendance',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@markAttendance',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.attendance.mark',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.new-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/new-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@newLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@newLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.new-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.transfer' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/transfer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@transfer',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@transfer',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.transfer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.allocated-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/allocated-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@allocatedLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@allocatedLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.allocated-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.pending-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/pending-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@pendingLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@pendingLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.pending-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.processing-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/processing-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@processingLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@processingLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.processing-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.interested-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/interested-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@interestedLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@interestedLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.interested-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.not-picked-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/not-picked-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@notpickedLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@notpickedLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.not-picked-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.visit-done-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/visit-done-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@visitDone',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@visitDone',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.visit-done-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.call-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/call-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@callLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@callLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.call-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.visit-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/visit-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@visitLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@visitLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.visit-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.cancelled-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/cancelled-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@cancelledLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@cancelledLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.cancelled-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.not-interested-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/not-interested-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@not_interested_leads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@not_interested_leads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.not-interested-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.not-reachable-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/not-reachable-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@not_reachable_leads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@not_reachable_leads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.not-reachable-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.wrong-number-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/wrong-number-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@wrong_number_leads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@wrong_number_leads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.wrong-number-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.lost-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/lost-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@lost_leads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@lost_leads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.lost-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.future-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/future-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@future_leads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@future_leads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.future-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.converted-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/converted-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@convertedLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@convertedLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.converted-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.channel-partner-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/channel-partner-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@channelPartnerLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@channelPartnerLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.channel-partner-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.booked' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/booked',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@booked',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@booked',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.booked',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.whatsapp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/whatsapp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@whatsapp',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@whatsapp',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.whatsapp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.partially-complete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/partially-complete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@partially_complete',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@partially_complete',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.partially-complete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.all-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/all-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@all_leads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@all_leads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.all-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.completed' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/completed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@completed',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@completed',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.completed',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.meeting-scheduled-leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/meeting-scheduled-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@meetingScheduledLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@meetingScheduledLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.meeting-scheduled-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.get-users' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/get-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@getUsers',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@getUsers',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.get-users',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.share-leads' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/share-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@shareLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@shareLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.share-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.update-lead-status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/update-lead-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@updateStatus',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@updateStatus',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.update-lead-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.leads.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/leads/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@addLeads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@addLeads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.leads.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.leads.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/lead-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@lead_edit',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@lead_edit',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.leads.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.update-lead' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'mobile/update-lead/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@update_lead',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@update_lead',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.update-lead',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.create-leads' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/create-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@create_leads',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@create_leads',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.create-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.quick-leads' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/quick-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@quick_Lead',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileLeadController@quick_Lead',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.quick-leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.tasks' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/tasks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@index',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@index',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.tasks',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.task.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/tasks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@store',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@store',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.task.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.task.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/tasks/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@update',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@update',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.task.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.task.complete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/tasks/{id}/complete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@complete',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@complete',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.task.complete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.task.allocate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/tasks/allocate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@allocate',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileTaskController@allocate',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.task.allocate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.notifications' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileNotificationController@notification',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileNotificationController@notification',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.notifications',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.user.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@profile',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@profile',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.user.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.view-comments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/view-comments/{lead_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@view_comments',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@view_comments',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.view-comments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mobile/profile/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@profile_update',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@profile_update',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mobile.attendance.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mobile/attendance/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.mobile.login',
        ),
        'uses' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@status',
        'controller' => 'App\\Http\\Controllers\\Mobile\\MobileDashboardController@status',
        'namespace' => NULL,
        'prefix' => '/mobile',
        'where' => 
        array (
        ),
        'as' => 'mobile.attendance.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'setting/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@profile',
        'controller' => 'App\\Http\\Controllers\\SettingsController@profile',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.update_profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'setting/profile/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updateProfile',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.update_profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.update_password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'setting/password/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updatePassword',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.update_password',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.logo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'setting/change/logo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@change_logo',
        'controller' => 'App\\Http\\Controllers\\SettingsController@change_logo',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.logo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.login_log' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'setting/login/log',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@login_log',
        'controller' => 'App\\Http\\Controllers\\SettingsController@login_log',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.login_log',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.update_logo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'setting/update/logo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@update_logo',
        'controller' => 'App\\Http\\Controllers\\SettingsController@update_logo',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.update_logo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings.ratings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'setting/settings/ratings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@ratings',
        'controller' => 'App\\Http\\Controllers\\SettingsController@ratings',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'settings.ratings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'as' => 'users.index',
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@index',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'as' => 'users.create',
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@create',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'as' => 'users.store',
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@store',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'as' => 'users.show',
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@show',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/{user}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'as' => 'users.edit',
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@edit',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'as' => 'users.update',
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@update',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'as' => 'users.destroy',
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@destroy',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'users/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@import',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@import',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'users.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.update-status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'users/update-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@updateStatus',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@updateStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'users.update-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.check_delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'users/{id}/check-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@checkDelete',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@checkDelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'users.check_delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'promote.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promote/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@promote_list',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@promote_list',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'promote.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'promote.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promote/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@showPromote',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@showPromote',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'promote.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'promote.approved' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'promote/approved/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@approved',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@approved',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'promote.approved',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'designation.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'designation/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@designation_list',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@designation_list',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'designation.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'designation.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'designation/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@update_designation',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@update_designation',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'designation.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'designation.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'designation/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@store_designation',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@store_designation',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'designation.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company.hierarchy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'company/hierarchy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@company_hierarchy',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@company_hierarchy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'company.hierarchy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'category/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@category_list',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@category_list',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'category.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update.category' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'category/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@update_category',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@update_category',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update.category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'category/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:universal_modules',
        ),
        'uses' => 'App\\Http\\Controllers\\StaffManagementController@store_category',
        'controller' => 'App\\Http\\Controllers\\StaffManagementController@store_category',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'category.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@dashboard',
        'controller' => 'App\\Http\\Controllers\\DashboardController@dashboard',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@search',
        'controller' => 'App\\Http\\Controllers\\DashboardController@search',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.toggle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'attendance-toggle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@toggle',
        'controller' => 'App\\Http\\Controllers\\DashboardController@toggle',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'attendance.toggle',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.chart-data' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-chart-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@getChartData',
        'controller' => 'App\\Http\\Controllers\\DashboardController@getChartData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard.chart-data',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.export-chart' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/export-chart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@exportChartData',
        'controller' => 'App\\Http\\Controllers\\DashboardController@exportChartData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard.export-chart',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.analytics' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/analytics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@getAnalyticsData',
        'controller' => 'App\\Http\\Controllers\\DashboardController@getAnalyticsData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard.analytics',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.export.analytics' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/export-analytics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@exportAnalyticsData',
        'controller' => 'App\\Http\\Controllers\\DashboardController@exportAnalyticsData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard.export.analytics',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.form' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'role-permission/{secret}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\RolePermissionController@form',
        'controller' => 'App\\Http\\Controllers\\RolePermissionController@form',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'role.permission.form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'role-permission/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\RolePermissionController@store',
        'controller' => 'App\\Http\\Controllers\\RolePermissionController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'role.permission.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'role-permission/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\RolePermissionController@update',
        'controller' => 'App\\Http\\Controllers\\RolePermissionController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'role.permission.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'role-permission/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\RolePermissionController@delete',
        'controller' => 'App\\Http\\Controllers\\RolePermissionController@delete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'role.permission.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'permission/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\RolePermissionController@storePermission',
        'controller' => 'App\\Http\\Controllers\\RolePermissionController@storePermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'permission/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\RolePermissionController@updatePermission',
        'controller' => 'App\\Http\\Controllers\\RolePermissionController@updatePermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permission.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'permission/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\RolePermissionController@deletePermission',
        'controller' => 'App\\Http\\Controllers\\RolePermissionController@deletePermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'permission.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'form.field' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'form/field',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@form_field',
        'controller' => 'App\\Http\\Controllers\\MasterController@form_field',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'form.field',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'form/field',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@update_settings',
        'controller' => 'App\\Http\\Controllers\\MasterController@update_settings',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'settings.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project.name' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@project_name',
        'controller' => 'App\\Http\\Controllers\\MasterController@project_name',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'project.name',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'project/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@store_project',
        'controller' => 'App\\Http\\Controllers\\MasterController@store_project',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'project.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'project/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@update_project',
        'controller' => 'App\\Http\\Controllers\\MasterController@update_project',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'project.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaign' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'campaign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@campaign',
        'controller' => 'App\\Http\\Controllers\\MasterController@campaign',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'campaign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaign.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'campaign/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@campaign_update',
        'controller' => 'App\\Http\\Controllers\\MasterController@campaign_update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'campaign.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaigns.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'campaign/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@campaign_store',
        'controller' => 'App\\Http\\Controllers\\MasterController@campaign_store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'campaigns.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'source.platform' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'source/platform',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@source_platform',
        'controller' => 'App\\Http\\Controllers\\MasterController@source_platform',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'source.platform',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'source.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'source/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@source_update',
        'controller' => 'App\\Http\\Controllers\\MasterController@source_update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'source.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'source.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'source/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@source_create',
        'controller' => 'App\\Http\\Controllers\\MasterController@source_create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'source.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'check.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'check/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@check_list',
        'controller' => 'App\\Http\\Controllers\\MasterController@check_list',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'check.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'checklist.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'checklist/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@checklist_update',
        'controller' => 'App\\Http\\Controllers\\MasterController@checklist_update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'checklist.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'checklist.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'checklist/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@checklist_store',
        'controller' => 'App\\Http\\Controllers\\MasterController@checklist_store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'checklist.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project.category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@project_category',
        'controller' => 'App\\Http\\Controllers\\MasterController@project_category',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'project.category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'project-category/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@category_update',
        'controller' => 'App\\Http\\Controllers\\MasterController@category_update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'category.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project_category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'project-category/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@project_category_store',
        'controller' => 'App\\Http\\Controllers\\MasterController@project_category_store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'project_category.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project.sub_category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project/sub-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@project_sub_category',
        'controller' => 'App\\Http\\Controllers\\MasterController@project_sub_category',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'project.sub_category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sub_category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sub-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@sub_category_store',
        'controller' => 'App\\Http\\Controllers\\MasterController@sub_category_store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sub_category.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sub_category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'sub-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@sub_category_update',
        'controller' => 'App\\Http\\Controllers\\MasterController@sub_category_update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sub_category.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@attendance',
        'controller' => 'App\\Http\\Controllers\\MasterController@attendance',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'attendance',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@store',
        'controller' => 'App\\Http\\Controllers\\MasterController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'attendance.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'attendance/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@update',
        'controller' => 'App\\Http\\Controllers\\MasterController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'attendance.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inquiry_question' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inquiry-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@inquiry_question',
        'controller' => 'App\\Http\\Controllers\\MasterController@inquiry_question',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inquiry_question',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inquiry-question.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'inquiry-question/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@inquiry_question_store',
        'controller' => 'App\\Http\\Controllers\\MasterController@inquiry_question_store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inquiry-question.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inquiry-question.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'inquiry-question/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@inquiry_question_update',
        'controller' => 'App\\Http\\Controllers\\MasterController@inquiry_question_update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'inquiry-question.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'integration.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'integration-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@integration_settings',
        'controller' => 'App\\Http\\Controllers\\MasterController@integration_settings',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'integration.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'integration.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'integration-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@integration_store',
        'controller' => 'App\\Http\\Controllers\\MasterController@integration_store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'integration.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'integration.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'integration-settings/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@integration_update',
        'controller' => 'App\\Http\\Controllers\\MasterController@integration_update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'integration.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'integration.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'integration-settings/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@integration_destroy',
        'controller' => 'App\\Http\\Controllers\\MasterController@integration_destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'integration.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'integrations.facebook.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'integrations/facebook/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\IntegrationController@checkFacebookSyncStatus',
        'controller' => 'App\\Http\\Controllers\\IntegrationController@checkFacebookSyncStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'integrations.facebook.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xfGbyRYxFvXXxOUI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-project-name/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getProjectName',
        'controller' => 'App\\Http\\Controllers\\LeadController@getProjectName',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::xfGbyRYxFvXXxOUI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'integration.auto-sync.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'integration/auto-sync/{integrationType}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\IntegrationController@updateAutoSync',
        'controller' => 'App\\Http\\Controllers\\IntegrationController@updateAutoSync',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'integration.auto-sync.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@add_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@add_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.add',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.import.upload' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/import/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@importUpload',
        'controller' => 'App\\Http\\Controllers\\LeadController@importUpload',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.import.upload',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.all_lead' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/all-lead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@all_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@all_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.all_lead',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.generate-share-link' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/generate-share-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@generateShareLink',
        'controller' => 'App\\Http\\Controllers\\LeadController@generateShareLink',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.generate-share-link',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.updateStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/update-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@updateStatus',
        'controller' => 'App\\Http\\Controllers\\LeadController@updateStatus',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.updateStatus',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.index' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@create_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@create_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.import' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@showImportForm',
        'controller' => 'App\\Http\\Controllers\\LeadController@showImportForm',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.import.process' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@processImport',
        'controller' => 'App\\Http\\Controllers\\LeadController@processImport',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.import.process',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.import.preview' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/import-preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@importPreview',
        'controller' => 'App\\Http\\Controllers\\LeadController@importPreview',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.import.preview',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.preview.import.process' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/import-process',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@importProcess',
        'controller' => 'App\\Http\\Controllers\\LeadController@importProcess',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.preview.import.process',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.allocate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/allocate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@allocate_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@allocate_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.allocate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.allocate_user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/allocate/lead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@allocateLeads',
        'controller' => 'App\\Http\\Controllers\\LeadController@allocateLeads',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.allocate_user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.unallocated' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/unallocated',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@unallocated_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@unallocated_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.unallocated',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.new' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/new',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@new_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@new_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.new',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.transfer_lead' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/transfer-lead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@transfer_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@transfer_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.transfer_lead',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.transfer_history' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/transfer-history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@transfer_history',
        'controller' => 'App\\Http\\Controllers\\LeadController@transfer_history',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.transfer_history',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.pending' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@pending',
        'controller' => 'App\\Http\\Controllers\\LeadController@pending',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.pending',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.processing' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/processing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@processing',
        'controller' => 'App\\Http\\Controllers\\LeadController@processing',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.processing',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.interested' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/interested',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@interested',
        'controller' => 'App\\Http\\Controllers\\LeadController@interested',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.interested',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.call_scheduled' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/call-scheduled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@call_scheduled',
        'controller' => 'App\\Http\\Controllers\\LeadController@call_scheduled',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.call_scheduled',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.meeting_scheduled' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/meeting-scheduled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@meeting_scheduled',
        'controller' => 'App\\Http\\Controllers\\LeadController@meeting_scheduled',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.meeting_scheduled',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.whatsapp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/whatsapp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@whatsapp',
        'controller' => 'App\\Http\\Controllers\\LeadController@whatsapp',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.whatsapp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.visit_scheduled' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/visit-scheduled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@visit_scheduled',
        'controller' => 'App\\Http\\Controllers\\LeadController@visit_scheduled',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.visit_scheduled',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.visit_done' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/visit-done',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@visit_done',
        'controller' => 'App\\Http\\Controllers\\LeadController@visit_done',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.visit_done',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.booked' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/booked',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@booked',
        'controller' => 'App\\Http\\Controllers\\LeadController@booked',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.booked',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.completed' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/completed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@completed',
        'controller' => 'App\\Http\\Controllers\\LeadController@completed',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.completed',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.cancelled' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/cancelled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@cancelled',
        'controller' => 'App\\Http\\Controllers\\LeadController@cancelled',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.cancelled',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.future' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/future',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@future',
        'controller' => 'App\\Http\\Controllers\\LeadController@future',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.future',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.transfer' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/transfer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@transfer',
        'controller' => 'App\\Http\\Controllers\\LeadController@transfer',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.transfer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'transfer_list.lead' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/transfer-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@transfer_leads',
        'controller' => 'App\\Http\\Controllers\\LeadController@transfer_leads',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'transfer_list.lead',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.transfer_user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/lead/transfer-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@transfer_user',
        'controller' => 'App\\Http\\Controllers\\LeadController@transfer_user',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.transfer_user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.channel_partner' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/channel-partner',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@channel_partner',
        'controller' => 'App\\Http\\Controllers\\LeadController@channel_partner',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.channel_partner',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.not_interested' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/not-interested',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@not_interested',
        'controller' => 'App\\Http\\Controllers\\LeadController@not_interested',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.not_interested',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.not_picked' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/not-picked',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@not_picked',
        'controller' => 'App\\Http\\Controllers\\LeadController@not_picked',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.not_picked',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.lost' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/lost',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@lost',
        'controller' => 'App\\Http\\Controllers\\LeadController@lost',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.lost',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.wrong_number' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/wrong-number',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@wrong_number',
        'controller' => 'App\\Http\\Controllers\\LeadController@wrong_number',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.wrong_number',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.not_reachable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/not-reachable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@not_reachable',
        'controller' => 'App\\Http\\Controllers\\LeadController@not_reachable',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.not_reachable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@edit_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@edit_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@update_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@update_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'leads.comments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/{lead}/comments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getComments',
        'controller' => 'App\\Http\\Controllers\\LeadController@getComments',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'leads.comments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.quick_add' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/quick-lead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@quick_lead',
        'controller' => 'App\\Http\\Controllers\\LeadController@quick_lead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.quick_add',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.duplicate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/duplicate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@duplicateLead',
        'controller' => 'App\\Http\\Controllers\\LeadController@duplicateLead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.duplicate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.share' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/share',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@shareLead',
        'controller' => 'App\\Http\\Controllers\\LeadController@shareLead',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.share',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.add-projects' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/add-projects',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@addProjects',
        'controller' => 'App\\Http\\Controllers\\LeadController@addProjects',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.add-projects',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.get-project-names' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/get-project-names',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getProjectNames',
        'controller' => 'App\\Http\\Controllers\\LeadController@getProjectNames',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.get-project-names',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.get-lead-projects' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/get-lead-projects',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getLeadProjects',
        'controller' => 'App\\Http\\Controllers\\LeadController@getLeadProjects',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.get-lead-projects',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.project-visits' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/{id}/project-visits',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getLeadProjectVisits',
        'controller' => 'App\\Http\\Controllers\\LeadController@getLeadProjectVisits',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.project-visits',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.filter' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/filter-lead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@filterLeads',
        'controller' => 'App\\Http\\Controllers\\LeadController@filterLeads',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.filter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'lead/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@delete',
        'controller' => 'App\\Http\\Controllers\\LeadController@delete',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.revoke-share' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/revoke-share',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@revokeShare',
        'controller' => 'App\\Http\\Controllers\\LeadController@revokeShare',
        'namespace' => NULL,
        'prefix' => '/lead',
        'where' => 
        array (
        ),
        'as' => 'lead.revoke-share',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.check-type' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/check-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@checkUserType',
        'controller' => 'App\\Http\\Controllers\\LeadController@checkUserType',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user.check-type',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'leads.filter.leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'leads/filter-lead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@filterLeads',
        'controller' => 'App\\Http\\Controllers\\LeadController@filterLeads',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'leads.filter.leads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'task/create/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:task_management',
        ),
        'uses' => 'App\\Http\\Controllers\\TaskController@create',
        'controller' => 'App\\Http\\Controllers\\TaskController@create',
        'namespace' => NULL,
        'prefix' => '/task',
        'where' => 
        array (
        ),
        'as' => 'task.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'task/store/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:task_management',
        ),
        'uses' => 'App\\Http\\Controllers\\TaskController@store',
        'controller' => 'App\\Http\\Controllers\\TaskController@store',
        'namespace' => NULL,
        'prefix' => '/task',
        'where' => 
        array (
        ),
        'as' => 'task.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'task/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:task_management',
        ),
        'uses' => 'App\\Http\\Controllers\\TaskController@list',
        'controller' => 'App\\Http\\Controllers\\TaskController@list',
        'namespace' => NULL,
        'prefix' => '/task',
        'where' => 
        array (
        ),
        'as' => 'task.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'task/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:task_management',
        ),
        'uses' => 'App\\Http\\Controllers\\TaskController@destroy',
        'controller' => 'App\\Http\\Controllers\\TaskController@destroy',
        'namespace' => NULL,
        'prefix' => '/task',
        'where' => 
        array (
        ),
        'as' => 'task.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task.update.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'task/update-status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:task_management',
        ),
        'uses' => 'App\\Http\\Controllers\\TaskController@updateStatus',
        'controller' => 'App\\Http\\Controllers\\TaskController@updateStatus',
        'namespace' => NULL,
        'prefix' => '/task',
        'where' => 
        array (
        ),
        'as' => 'task.update.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task.project.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'task/task-project-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:task_management',
        ),
        'uses' => 'App\\Http\\Controllers\\TaskController@task_project_store',
        'controller' => 'App\\Http\\Controllers\\TaskController@task_project_store',
        'namespace' => NULL,
        'prefix' => '/task',
        'where' => 
        array (
        ),
        'as' => 'task.project.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task.project.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'task/project/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:task_management',
        ),
        'uses' => 'App\\Http\\Controllers\\TaskController@task_project_update',
        'controller' => 'App\\Http\\Controllers\\TaskController@task_project_update',
        'namespace' => NULL,
        'prefix' => '/task',
        'where' => 
        array (
        ),
        'as' => 'task.project.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task.project.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'task/project/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:task_management',
        ),
        'uses' => 'App\\Http\\Controllers\\TaskController@task_project_destroy',
        'controller' => 'App\\Http\\Controllers\\TaskController@task_project_destroy',
        'namespace' => NULL,
        'prefix' => '/task',
        'where' => 
        array (
        ),
        'as' => 'task.project.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task.project.update-status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'task/project/update-status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:task_management',
        ),
        'uses' => 'App\\Http\\Controllers\\TaskController@updateProjectStatus',
        'controller' => 'App\\Http\\Controllers\\TaskController@updateProjectStatus',
        'namespace' => NULL,
        'prefix' => '/task',
        'where' => 
        array (
        ),
        'as' => 'task.project.update-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project-details.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'as' => 'project-details.index',
        'uses' => 'App\\Http\\Controllers\\ProjectController@index',
        'controller' => 'App\\Http\\Controllers\\ProjectController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project-details.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project-details/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'as' => 'project-details.create',
        'uses' => 'App\\Http\\Controllers\\ProjectController@create',
        'controller' => 'App\\Http\\Controllers\\ProjectController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project-details.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'project-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'as' => 'project-details.store',
        'uses' => 'App\\Http\\Controllers\\ProjectController@store',
        'controller' => 'App\\Http\\Controllers\\ProjectController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project-details.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project-details/{project_detail}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'as' => 'project-details.show',
        'uses' => 'App\\Http\\Controllers\\ProjectController@show',
        'controller' => 'App\\Http\\Controllers\\ProjectController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project-details.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project-details/{project_detail}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'as' => 'project-details.edit',
        'uses' => 'App\\Http\\Controllers\\ProjectController@edit',
        'controller' => 'App\\Http\\Controllers\\ProjectController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project-details.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'project-details/{project_detail}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'as' => 'project-details.update',
        'uses' => 'App\\Http\\Controllers\\ProjectController@update',
        'controller' => 'App\\Http\\Controllers\\ProjectController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project-details.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'project-details/{project_detail}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'as' => 'project-details.destroy',
        'uses' => 'App\\Http\\Controllers\\ProjectController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProjectController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GMtSoxTzsUuOSoMT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project-details/get-categories/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@getCategories',
        'controller' => 'App\\Http\\Controllers\\ProjectController@getCategories',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::GMtSoxTzsUuOSoMT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HnwnAP8jbt1OCJBh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'project-details/get-subcategories/{categoryId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@getSubcategories',
        'controller' => 'App\\Http\\Controllers\\ProjectController@getSubcategories',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HnwnAP8jbt1OCJBh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project-details.remove_image' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'project-details/remove-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ProjectController@removeImage',
        'controller' => 'App\\Http\\Controllers\\ProjectController@removeImage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'project-details.remove_image',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'event.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'event',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@index',
        'controller' => 'App\\Http\\Controllers\\EventController@index',
        'namespace' => NULL,
        'prefix' => '/event',
        'where' => 
        array (
        ),
        'as' => 'event.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'event.comments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'event/comments/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\EventController@showComments',
        'controller' => 'App\\Http\\Controllers\\EventController@showComments',
        'namespace' => NULL,
        'prefix' => '/event',
        'where' => 
        array (
        ),
        'as' => 'event.comments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.daily' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'attendance/daily',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@daily',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@daily',
        'namespace' => NULL,
        'prefix' => '/attendance',
        'where' => 
        array (
        ),
        'as' => 'attendance.daily',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.monthly' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'attendance/monthly',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\AttendanceController@monthly',
        'controller' => 'App\\Http\\Controllers\\AttendanceController@monthly',
        'namespace' => NULL,
        'prefix' => '/attendance',
        'where' => 
        array (
        ),
        'as' => 'attendance.monthly',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.tracking' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/tracking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\EmployeeTrackController@tracking',
        'controller' => 'App\\Http\\Controllers\\EmployeeTrackController@tracking',
        'namespace' => NULL,
        'prefix' => '/employee',
        'where' => 
        array (
        ),
        'as' => 'employee.tracking',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.timeline' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/timeline',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\EmployeeTrackController@timeline',
        'controller' => 'App\\Http\\Controllers\\EmployeeTrackController@timeline',
        'namespace' => NULL,
        'prefix' => '/employee',
        'where' => 
        array (
        ),
        'as' => 'employee.timeline',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expense.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'expense',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenseController@index',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'expense.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expense.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expense',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenseController@store',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'expense.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expense.bulk-accept' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expense/bulk-accept',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenseController@bulkAccept',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@bulkAccept',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'expense.bulk-accept',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expense.bulk-reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expense/bulk-reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenseController@bulkReject',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@bulkReject',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'expense.bulk-reject',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expense.accept' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expense/{id}/accept',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenseController@accept',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@accept',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'expense.accept',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expense.reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expense/{id}/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenseController@reject',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@reject',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'expense.reject',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expense.clear' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'expense/{id}/clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenseController@clear',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@clear',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'expense.clear',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'expense.images' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'expense/{id}/images',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ExpenseController@getImages',
        'controller' => 'App\\Http\\Controllers\\ExpenseController@getImages',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'expense.images',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.dayend_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/dayend-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@dayend_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@dayend_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.dayend_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.talecaller_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/talecaller-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@talecaller_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@talecaller_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.talecaller_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.salesman_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/salesman-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@salesman_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@salesman_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.salesman_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.campaign_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/campaign-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@campaign_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@campaign_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.campaign_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.source_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/source-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@source_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@source_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.source_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.classification_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/classification-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@classificationReports',
        'controller' => 'App\\Http\\Controllers\\ReportController@classificationReports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.classification_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.project_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/project-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@project_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@project_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.project_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.category_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/category-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@category_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@category_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.category_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.sub_category_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/sub-category-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@sub_category_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@sub_category_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.sub_category_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.city_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/city-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@city_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@city_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.city_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.state_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/state-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@state_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@state_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.state_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.address_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/address-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@address_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@address_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.address_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.interested_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/interested-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@interested_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@interested_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.interested_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.visit_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/visit-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@visit_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@visit_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.visit_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.call_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/call-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@call_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@call_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.call_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.call_details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/call-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@call_details',
        'controller' => 'App\\Http\\Controllers\\ReportController@call_details',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.call_details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.smart_lead' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'report/smart-lead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@smart_lead',
        'controller' => 'App\\Http\\Controllers\\ReportController@smart_lead',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.smart_lead',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-categories' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'report/get-categories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@getCategories',
        'controller' => 'App\\Http\\Controllers\\ReportController@getCategories',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'get-categories',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-subcategories' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'report/get-subcategories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@getSubCategories',
        'controller' => 'App\\Http\\Controllers\\ReportController@getSubCategories',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'get-subcategories',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-cities' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'report/get-cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@getCities',
        'controller' => 'App\\Http\\Controllers\\ReportController@getCities',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'get-cities',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-call' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'report/log-call',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@logCall',
        'controller' => 'App\\Http\\Controllers\\ReportController@logCall',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'log-call',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'initiate-call' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/initiate-call/{lead}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@initiateCall',
        'controller' => 'App\\Http\\Controllers\\ReportController@initiateCall',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'initiate-call',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task-report-summary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/task-report-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@taskReportSummary',
        'controller' => 'App\\Http\\Controllers\\ReportController@taskReportSummary',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'task-report-summary',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task-overdue-summary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/task-overdue-summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@overdueTasksReport',
        'controller' => 'App\\Http\\Controllers\\ReportController@overdueTasksReport',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'task-overdue-summary',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'upcoming-tasks' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/upcoming-tasks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@upcomingTasksReport',
        'controller' => 'App\\Http\\Controllers\\ReportController@upcomingTasksReport',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'upcoming-tasks',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'task-completion' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/task-completion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@taskCompletionReport',
        'controller' => 'App\\Http\\Controllers\\ReportController@taskCompletionReport',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'task-completion',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'project-wise-task' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/project-wise-task',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@projectWiseTaskReport',
        'controller' => 'App\\Http\\Controllers\\ReportController@projectWiseTaskReport',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'project-wise-task',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.communication_reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/communication-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@communication_reports',
        'controller' => 'App\\Http\\Controllers\\ReportController@communication_reports',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.communication_reports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.agent_call_details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/agent-call-details/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@agentCallDetails',
        'controller' => 'App\\Http\\Controllers\\ReportController@agentCallDetails',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.agent_call_details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.client_communications' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report/client-communications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@clientCommunications',
        'controller' => 'App\\Http\\Controllers\\ReportController@clientCommunications',
        'namespace' => NULL,
        'prefix' => '/report',
        'where' => 
        array (
        ),
        'as' => 'report.client_communications',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead-status.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadStatusController@index',
        'controller' => 'App\\Http\\Controllers\\LeadStatusController@index',
        'as' => 'lead-status.index',
        'namespace' => NULL,
        'prefix' => '/lead-status',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead-status.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadStatusController@store',
        'controller' => 'App\\Http\\Controllers\\LeadStatusController@store',
        'as' => 'lead-status.store',
        'namespace' => NULL,
        'prefix' => '/lead-status',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead-status.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'lead-status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadStatusController@update',
        'controller' => 'App\\Http\\Controllers\\LeadStatusController@update',
        'as' => 'lead-status.update',
        'namespace' => NULL,
        'prefix' => '/lead-status',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead-status.update-sequence' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'lead-status/sequence/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadStatusController@updateSequence',
        'controller' => 'App\\Http\\Controllers\\LeadStatusController@updateSequence',
        'as' => 'lead-status.update-sequence',
        'namespace' => NULL,
        'prefix' => '/lead-status',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead-status.update-roles' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'lead-status/roles/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadStatusController@updateRoles',
        'controller' => 'App\\Http\\Controllers\\LeadStatusController@updateRoles',
        'as' => 'lead-status.update-roles',
        'namespace' => NULL,
        'prefix' => '/lead-status',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead-status.rename' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead-status/rename/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadStatusController@rename',
        'controller' => 'App\\Http\\Controllers\\LeadStatusController@rename',
        'as' => 'lead-status.rename',
        'namespace' => NULL,
        'prefix' => '/lead-status',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead-status.toggle' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead-status/toggle/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadStatusController@toggleActive',
        'controller' => 'App\\Http\\Controllers\\LeadStatusController@toggleActive',
        'as' => 'lead-status.toggle',
        'namespace' => NULL,
        'prefix' => '/lead-status',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead-status.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'lead-status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadStatusController@destroy',
        'controller' => 'App\\Http\\Controllers\\LeadStatusController@destroy',
        'as' => 'lead-status.destroy',
        'namespace' => NULL,
        'prefix' => '/lead-status',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'system-configuration.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'system-configuration',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SystemConfigurationController@index',
        'controller' => 'App\\Http\\Controllers\\SystemConfigurationController@index',
        'as' => 'system-configuration.index',
        'namespace' => NULL,
        'prefix' => '/system-configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.toggle-pin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'leads/toggle-pin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@togglePin',
        'controller' => 'App\\Http\\Controllers\\LeadController@togglePin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'lead.toggle-pin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'integrations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'integrations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\IntegrationController@index',
        'controller' => 'App\\Http\\Controllers\\IntegrationController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'integrations.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'integrations.housing.sync' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'integrations/housing/sync',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\IntegrationController@syncHousing',
        'controller' => 'App\\Http\\Controllers\\IntegrationController@syncHousing',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'integrations.housing.sync',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'integrations.facebook.sync' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'integrations/facebook/sync',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\IntegrationController@syncFacebook',
        'controller' => 'App\\Http\\Controllers\\IntegrationController@syncFacebook',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'integrations.facebook.sync',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facebook.token.exchange' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'facebook/token/exchange',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\IntegrationController@exchangeToken',
        'controller' => 'App\\Http\\Controllers\\IntegrationController@exchangeToken',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'facebook.token.exchange',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facebook.pages.fetch' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'facebook/pages/fetch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\IntegrationController@fetchPages',
        'controller' => 'App\\Http\\Controllers\\IntegrationController@fetchPages',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'facebook.pages.fetch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facebook.group.fetch' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'facebook/groups/fetch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\IntegrationController@groupPages',
        'controller' => 'App\\Http\\Controllers\\IntegrationController@groupPages',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'facebook.group.fetch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facebook.campaigns.fetch' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'facebook/campaigns/fetch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\IntegrationController@fetchCampaigns',
        'controller' => 'App\\Http\\Controllers\\IntegrationController@fetchCampaigns',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'facebook.campaigns.fetch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notifications.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'notifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@index',
        'controller' => 'App\\Http\\Controllers\\SettingsController@index',
        'as' => 'notifications.index',
        'namespace' => NULL,
        'prefix' => '/notifications',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notifications.markAllRead' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'notifications/mark-all-read',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@markAllAsRead',
        'controller' => 'App\\Http\\Controllers\\SettingsController@markAllAsRead',
        'as' => 'notifications.markAllRead',
        'namespace' => NULL,
        'prefix' => '/notifications',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.integration' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'setting/integration',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@integration',
        'controller' => 'App\\Http\\Controllers\\SettingsController@integration',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.integration',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.notification' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'setting/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@notification',
        'controller' => 'App\\Http\\Controllers\\SettingsController@notification',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.notification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.notification.mark_all_read' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'setting/notification/mark-read',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@markAllRead',
        'controller' => 'App\\Http\\Controllers\\SettingsController@markAllRead',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.notification.mark_all_read',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.targets' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mis/targets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@targets',
        'controller' => 'App\\Http\\Controllers\\MISController@targets',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.targets',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.targets.save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mis/targets/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@saveTargets',
        'controller' => 'App\\Http\\Controllers\\MISController@saveTargets',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.targets.save',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.admin.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mis/admin/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@adminUpdate',
        'controller' => 'App\\Http\\Controllers\\MISController@adminUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.admin.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.summary-report' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mis/summary-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@summaryReport',
        'controller' => 'App\\Http\\Controllers\\MISController@summaryReport',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.summary-report',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.daily-report' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mis/daily-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@dailyReport',
        'controller' => 'App\\Http\\Controllers\\MISController@dailyReport',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.daily-report',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.get.week.daily.data' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mis/get-week-daily-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@getWeekDailyData',
        'controller' => 'App\\Http\\Controllers\\MISController@getWeekDailyData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.get.week.daily.data',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.admin.update.daily.achieved' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mis/admin/update-daily-achieved',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@updateDailyAchieved',
        'controller' => 'App\\Http\\Controllers\\MISController@updateDailyAchieved',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.admin.update.daily.achieved',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.get.autoassign.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mis/get-autoassign-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@getAutoAssignStatus',
        'controller' => 'App\\Http\\Controllers\\MISController@getAutoAssignStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.get.autoassign.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.points' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mis-points',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@mis_points',
        'controller' => 'App\\Http\\Controllers\\MasterController@mis_points',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.points',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.points.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mis-points/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@mis_points_store',
        'controller' => 'App\\Http\\Controllers\\MasterController@mis_points_store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.points.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.points.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'mis-points/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@mis_points_update',
        'controller' => 'App\\Http\\Controllers\\MasterController@mis_points_update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.points.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.points.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'mis-points/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@mis_points_destroy',
        'controller' => 'App\\Http\\Controllers\\MasterController@mis_points_destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.points.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'premium.features' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'premium-features',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SoftwareFeatureController@index',
        'controller' => 'App\\Http\\Controllers\\SoftwareFeatureController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'premium.features',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'premium-features.request' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'premium-features/request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SoftwareFeatureController@requestAccess',
        'controller' => 'App\\Http\\Controllers\\SoftwareFeatureController@requestAccess',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'premium-features.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'premium-features.activate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'premium-features/activate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SoftwareFeatureController@activateFeature',
        'controller' => 'App\\Http\\Controllers\\SoftwareFeatureController@activateFeature',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'premium-features.activate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'start-free-trial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'start-free-trial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SoftwareFeatureController@startFreeTrial',
        'controller' => 'App\\Http\\Controllers\\SoftwareFeatureController@startFreeTrial',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'start-free-trial',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertisement.deactivate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'advertisement/deactivate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\AdvertisementController@deactivate',
        'controller' => 'App\\Http\\Controllers\\AdvertisementController@deactivate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'advertisement.deactivate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'support-tickets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@index',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'support.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'support-tickets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@store',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'support.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'support-tickets/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@update',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'support.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.toggle' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'support-tickets/{id}/toggle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\SupportTicketController@toggleStatus',
        'controller' => 'App\\Http\\Controllers\\SupportTicketController@toggleStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'support.toggle',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post-sale',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@index',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@index',
        'as' => 'post-sale.index',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'post-sale',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@store',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@store',
        'as' => 'post-sale.store',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post-sale/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@edit',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@edit',
        'as' => 'post-sale.edit',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'post-sale/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@update',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@update',
        'as' => 'post-sale.update',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'post-sale/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@destroy',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@destroy',
        'as' => 'post-sale.destroy',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post-sale/subcategories/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@getSubcategories',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@getSubcategories',
        'as' => 'post-sale.',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.generated::H0xwOpxd6C9zKkdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post-sale/{id}/documents',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@getDocuments',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@getDocuments',
        'as' => 'post-sale.generated::H0xwOpxd6C9zKkdf',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.generated::p0H8gYAFz6yhbqni' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'post-sale/{id}/upload-document',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@uploadDocument',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@uploadDocument',
        'as' => 'post-sale.generated::p0H8gYAFz6yhbqni',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.generated::qnRuGag8hJ6eqiwH' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'post-sale/document/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@deleteDocument',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@deleteDocument',
        'as' => 'post-sale.generated::qnRuGag8hJ6eqiwH',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.by-lead' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post-sale/lead/{leadId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@getByLeadId',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@getByLeadId',
        'as' => 'post-sale.by-lead',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post-sale.rate-link' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'post-sale/rate-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:all_modules,real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@generateRatingLink',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@generateRatingLink',
        'as' => 'post-sale.rate-link',
        'namespace' => NULL,
        'prefix' => '/post-sale',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inventory.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inventory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\InventoryController@index',
        'controller' => 'App\\Http\\Controllers\\InventoryController@index',
        'namespace' => NULL,
        'prefix' => '/inventory',
        'where' => 
        array (
        ),
        'as' => 'inventory.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inventory.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'inventory/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\InventoryController@store',
        'controller' => 'App\\Http\\Controllers\\InventoryController@store',
        'namespace' => NULL,
        'prefix' => '/inventory',
        'where' => 
        array (
        ),
        'as' => 'inventory.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inventory.updateSale' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'inventory/update-sale',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\InventoryController@updateSale',
        'controller' => 'App\\Http\\Controllers\\InventoryController@updateSale',
        'namespace' => NULL,
        'prefix' => '/inventory',
        'where' => 
        array (
        ),
        'as' => 'inventory.updateSale',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inventory.getLeads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inventory/get-leads/{userId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\InventoryController@getLeads',
        'controller' => 'App\\Http\\Controllers\\InventoryController@getLeads',
        'namespace' => NULL,
        'prefix' => '/inventory',
        'where' => 
        array (
        ),
        'as' => 'inventory.getLeads',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inventory.saleHistory' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'inventory/sale-history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\InventoryController@getSaleHistory',
        'controller' => 'App\\Http\\Controllers\\InventoryController@getSaleHistory',
        'namespace' => NULL,
        'prefix' => '/inventory',
        'where' => 
        array (
        ),
        'as' => 'inventory.saleHistory',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inventory.import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'inventory/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\InventoryController@import',
        'controller' => 'App\\Http\\Controllers\\InventoryController@import',
        'namespace' => NULL,
        'prefix' => '/inventory',
        'where' => 
        array (
        ),
        'as' => 'inventory.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'inventory.downloadTemplate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inventory/download-template',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:real_state_only',
        ),
        'uses' => 'App\\Http\\Controllers\\InventoryController@downloadTemplate',
        'controller' => 'App\\Http\\Controllers\\InventoryController@downloadTemplate',
        'namespace' => NULL,
        'prefix' => '/inventory',
        'where' => 
        array (
        ),
        'as' => 'inventory.downloadTemplate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.get.team.points' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mis/get-team-points',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@getTeamPoints',
        'controller' => 'App\\Http\\Controllers\\MISController@getTeamPoints',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.get.team.points',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.save.daily.entries' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mis/save-daily-entries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@saveDailyEntries',
        'controller' => 'App\\Http\\Controllers\\MISController@saveDailyEntries',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.save.daily.entries',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.get.daily.data' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mis/get-daily-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@getDailyData',
        'controller' => 'App\\Http\\Controllers\\MISController@getDailyData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.get.daily.data',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mis.get.week.number' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mis/get-week-number',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
          3 => 'check.software.type:mis_management',
        ),
        'uses' => 'App\\Http\\Controllers\\MISController@getWeekNumber',
        'controller' => 'App\\Http\\Controllers\\MISController@getWeekNumber',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mis.get.week.number',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'exhibitions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@index',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@index',
        'as' => 'exhibition.index',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'exhibitions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@store',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@store',
        'as' => 'exhibition.store',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'exhibitions/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@update',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@update',
        'as' => 'exhibition.update',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'exhibitions/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@destroy',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@destroy',
        'as' => 'exhibition.destroy',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'exhibitions/{id}/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@view',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@view',
        'as' => 'exhibition.view',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.leads.page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'exhibitions/{id}/leads-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@leadsPage',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@leadsPage',
        'as' => 'exhibition.leads.page',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.leads.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'exhibitions/leads/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@updateLead',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@updateLead',
        'as' => 'exhibition.leads.update',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'exhibitions/{id}/leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@getLeads',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@getLeads',
        'as' => 'exhibition.leads',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.lead.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'exhibitions/leads/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@getLeadDetails',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@getLeadDetails',
        'as' => 'exhibition.lead.details',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.activate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'exhibitions/{id}/activate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@activate',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@activate',
        'as' => 'exhibition.activate',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.leads.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'exhibitions/{id}/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@storeLead',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@storeLead',
        'as' => 'exhibition.leads.store',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'exhibitions/{id}/{exhibition_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@destroyLead',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@destroyLead',
        'as' => 'exhibition.',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.leads.convert' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'exhibitions/{lead}/convert',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@convertLeadToCRM',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@convertLeadToCRM',
        'as' => 'exhibition.leads.convert',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.leads.convert.multiple' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'exhibitions/convert-multiple',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@convertMultipleLeads',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@convertMultipleLeads',
        'as' => 'exhibition.leads.convert.multiple',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.share.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'exhibitions/{exhibition}/share/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@createShareLink',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@createShareLink',
        'as' => 'exhibition.share.create',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.share.links' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'exhibitions/{exhibition}/share/links',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@getShareLinks',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@getShareLinks',
        'as' => 'exhibition.share.links',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.leads.import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'exhibitions/{exhibition}/leads/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@import',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@import',
        'as' => 'exhibition.leads.import',
        'namespace' => NULL,
        'prefix' => '/exhibitions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messaging.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messaging',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@index',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@index',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'messaging.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messaging.send' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'messaging/send',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@sendMessage',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@sendMessage',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'messaging.send',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messaging.send.with-attachments' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'messaging/send-with-attachments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@sendWithAttachments',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@sendWithAttachments',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'messaging.send.with-attachments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AB2dZx5HXsvIzNP8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messaging/templates/{channel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@getTemplates',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@getTemplates',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'generated::AB2dZx5HXsvIzNP8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LHcKqiLKQflOmKvz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messaging/templates/{channel}/{templateId}/preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@getTemplatePreview',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@getTemplatePreview',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'generated::LHcKqiLKQflOmKvz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fmfRDsOd769JUS7t' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messaging/channels',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@getChannels',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@getChannels',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'generated::fmfRDsOd769JUS7t',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gzqHmo98YCFvJxOO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messaging/leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@getLeads',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@getLeads',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'generated::gzqHmo98YCFvJxOO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6qn75fPAOL2iVRpa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messaging/exhibition/leads/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@getExhibitionLeadsDetails',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@getExhibitionLeadsDetails',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'generated::6qn75fPAOL2iVRpa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messaging.templates.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messaging/create-template',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@createTemplatePage',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@createTemplatePage',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'messaging.templates.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messaging.templates.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'messaging/store-template',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@storeTemplate',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@storeTemplate',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'messaging.templates.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messaging.cleanup-temp-files' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'messaging/cleanup-temp-files',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@cleanupTempFiles',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@cleanupTempFiles',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'messaging.cleanup-temp-files',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messaging.templates.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messaging/{template}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@edit',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@edit',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'messaging.templates.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messaging.templates.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'messaging/{template}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@update',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@update',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'messaging.templates.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messaging.templates.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'messaging/{template}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@destroy',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@destroy',
        'namespace' => NULL,
        'prefix' => '/messaging',
        'where' => 
        array (
        ),
        'as' => 'messaging.templates.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'data-center/data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@index',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@index',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'data-center/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@create',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@create',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'data-center/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@store',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@store',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.import.upload' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'data-center/import/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@importUpload',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@importUpload',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.import.upload',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'data-center/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@edit',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@edit',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'data-center/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@update',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@update',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.update-status' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'data-center/status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@updateStatusApi',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@updateStatusApi',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.update-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'data-center/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@destroy',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@destroy',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.comments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'data-center/comments/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@getComments',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@getComments',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.comments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'data-center.add-comment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'data-center/comments/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\DataCenterController@addComment',
        'controller' => 'App\\Http\\Controllers\\DataCenterController@addComment',
        'namespace' => NULL,
        'prefix' => '/data-center',
        'where' => 
        array (
        ),
        'as' => 'data-center.add-comment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibitions.toggle-auto-welcome' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'exhibitions/{id}/toggle-auto-welcome',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@toggleAutoWelcome',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@toggleAutoWelcome',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'exhibitions.toggle-auto-welcome',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibitions.get-details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'exhibitions/{id}/get-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@getExhibitionDetails',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@getExhibitionDetails',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'exhibitions.get-details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.message' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'exhibition/{id}/message',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\UnifiedMessagingController@exhibitionMessage',
        'controller' => 'App\\Http\\Controllers\\UnifiedMessagingController@exhibitionMessage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'exhibition.message',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.share.access' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'exhibition/share/{shareCode}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@accessShareLink',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@accessShareLink',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'exhibition.share.access',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'exhibition.share.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'exhibition-share/{shareCode}/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\WebExhibitionController@submitShareForm',
        'controller' => 'App\\Http\\Controllers\\WebExhibitionController@submitShareForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'exhibition.share.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.matching-properties' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/{id}/matching-properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getMatchingProperties',
        'controller' => 'App\\Http\\Controllers\\LeadController@getMatchingProperties',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'lead.matching-properties',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.refresh-matching' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'lead/{id}/refresh-matching',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@refreshMatchingProperties',
        'controller' => 'App\\Http\\Controllers\\LeadController@refreshMatchingProperties',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'lead.refresh-matching',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.share-whatsapp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'property/share-whatsapp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@sharePropertyOnWhatsApp',
        'controller' => 'App\\Http\\Controllers\\LeadController@sharePropertyOnWhatsApp',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'property.share-whatsapp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'property/{id}/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getPropertyDetails',
        'controller' => 'App\\Http\\Controllers\\LeadController@getPropertyDetails',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'property.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lead.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lead/{id}/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\LeadController@getDetails',
        'controller' => 'App\\Http\\Controllers\\LeadController@getDetails',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'lead.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.name' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@property_name',
        'controller' => 'App\\Http\\Controllers\\MasterController@property_name',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'property.name',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'properties/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@store_property',
        'controller' => 'App\\Http\\Controllers\\MasterController@store_property',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'property.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'properties/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'check.login',
          2 => 'reception.only',
        ),
        'uses' => 'App\\Http\\Controllers\\MasterController@update_property',
        'controller' => 'App\\Http\\Controllers\\MasterController@update_property',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'property.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::thXd1Fbg6dgwLaPI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'firebase-sw-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:467:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:248:"function () {
    $firebase = \\DB::table(\'integration_settings\')
        ->where(\'integration_type\', \'firebase\')
        ->where(\'status\', \'active\')
        ->first();
    return \\response()->json(\\json_decode($firebase->settings ?? \'{}\'));
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000056c0000000000000000";}";s:4:"hash";s:44:"pusC8H4rjDiD3edah0oL46XmVw9pshADvNW2d5zO198=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::thXd1Fbg6dgwLaPI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rate.form' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'rate/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PostSaleController@rate',
        'controller' => 'App\\Http\\Controllers\\PostSaleController@rate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'rate.form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cyjE3Nge0rBb24Wn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-storage-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:336:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:117:"function () {
    \\Illuminate\\Support\\Facades\\Artisan::call(\'storage:link\');
    return \'Storage link created!\';
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000097d0000000000000000";}";s:4:"hash";s:44:"aFykMHMNcp6qV6V66Gxh/mGYlbZS+6mgXpb8BdBJ3tk=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::cyjE3Nge0rBb24Wn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XldTWQFzQ9UsOHhQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clear-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:596:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:377:"function () {
    \\Illuminate\\Support\\Facades\\Artisan::call(\'cache:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'route:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'config:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'view:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'optimize\');
    return \'All caches cleared and optimized!\';
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000097f0000000000000000";}";s:4:"hash";s:44:"dCZQ2B1/YZV/akIeSuH8fTiAY8PukLNR9MEkFh8qong=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::XldTWQFzQ9UsOHhQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::i17Cm9JVo5gutfFd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'refresh-storage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:421:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:202:"function () {
    $src = \\storage_path(\'app/public\');
    $dst = \\public_path(\'storage\');
    \\File::deleteDirectory($dst);
    \\File::copyDirectory($src, $dst);
    return \'Storage refreshed!\';
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000009810000000000000000";}";s:4:"hash";s:44:"HuFPI/BqCDobgL6WCJRsdrSwjEDRnf2rGJ3s7xdChgA=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::i17Cm9JVo5gutfFd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
