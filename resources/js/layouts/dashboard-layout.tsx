import { Link, usePage } from '@inertiajs/react';
import { PropsWithChildren } from 'react';
import Main from './main';
import { PageProps } from '@/types/global';

const DashboardLayout = ({ children }: PropsWithChildren) => {
   const { auth } = usePage<PageProps>().props;

   return (
      <Main>
         <div className="min-h-screen bg-background">
            <nav className="border-b bg-card">
               <div className="container mx-auto px-4">
                  <div className="flex h-16 items-center justify-between">
                     <div className="flex items-center gap-8">
                        <Link href="/" className="text-xl font-bold">
                           Dashboard
                        </Link>
                        <div className="hidden md:flex gap-6">
                           <Link href={route('dashboard')} className="text-sm font-medium hover:text-primary">
                              Home
                           </Link>
                        </div>
                     </div>
                     <div className="flex items-center gap-4">
                        <span className="text-sm">{auth.user?.name}</span>
                        <Link
                           href={route('logout')}
                           method="post"
                           as="button"
                           className="text-sm font-medium hover:text-primary"
                        >
                           Logout
                        </Link>
                     </div>
                  </div>
               </div>
            </nav>
            <main className="container mx-auto px-4 py-8">{children}</main>
         </div>
      </Main>
   );
};

export default DashboardLayout;
