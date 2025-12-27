import { routeLastSegment } from '@/lib/route';
import { LayoutDashboard, Settings, Users } from 'lucide-react';

const dashboardRoutes: DashboardRoute[] = [
   {
      title: 'Main Menu',
      slug: 'main-menu',
      pages: [
         {
            Icon: LayoutDashboard,
            name: 'Dashboard',
            path: route('dashboard'),
            slug: routeLastSegment(route('dashboard')),
            active: true,
            access: ['admin', 'instructor', 'collaborative', 'administrative'],
            children: [],
         },
      ],
   },
];

export default dashboardRoutes;
