import InputError from '@/components/input-error';
import LoadingButton from '@/components/loading-button';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthLayout from '@/layouts/auth-layout';
import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';

interface LoginProps {
   status?: string;
   canResetPassword: boolean;
   googleLogIn: boolean;
   recaptcha: {
      status: boolean;
      siteKey: string;
      secretKey: string;
   };
}

export default function Login({ status, recaptcha, canResetPassword, googleLogIn }: LoginProps) {
   const { data, setData, post, processing, errors, reset } = useForm({
      email: '',
      password: '',
      remember: false as boolean,
      recaptcha: '',
      recaptcha_status: recaptcha.status,
   });

   const submit: FormEventHandler = (e) => {
      e.preventDefault();
      post(route('login'), {
         onFinish: () => reset('password', 'recaptcha'),
      });
   };

   return (
      <AuthLayout title="Sign in to your account" description="Enter your credentials to access your account">
         <Head title="Login" />
         <form className="flex flex-col gap-6" onSubmit={submit}>
            <div className="grid gap-6">
               <div className="grid gap-2">
                  <Label htmlFor="email">Email</Label>
                  <Input
                     id="email"
                     type="email"
                     required
                     autoFocus
                     tabIndex={1}
                     autoComplete="email"
                     value={data.email}
                     onChange={(e) => setData('email', e.target.value)}
                     placeholder="Enter your email"
                  />
                  <InputError message={errors.email} />
               </div>

               <div className="grid gap-2">
                  <div className="flex items-center">
                     <Label htmlFor="password">Password</Label>
                     {canResetPassword && (
                        <Link href={route('password.request')} className="ml-auto text-sm underline underline-offset-4" tabIndex={5}>
                           Forgot password?
                        </Link>
                     )}
                  </div>
                  <Input
                     id="password"
                     type="password"
                     required
                     tabIndex={2}
                     autoComplete="current-password"
                     value={data.password}
                     onChange={(e) => setData('password', e.target.value)}
                     placeholder="Enter your password"
                  />
                  <InputError message={errors.password} />
               </div>

               <div className="flex items-center space-x-3">
                  <Checkbox id="remember" name="remember" checked={data.remember} onClick={() => setData('remember', !data.remember)} tabIndex={3} />
                  <Label htmlFor="remember">Remember me</Label>
               </div>

               <LoadingButton loading={processing} type="submit" className="w-full">
                  Sign in
               </LoadingButton>

               {googleLogIn && (
                  <>
                     <div className="after:border-border relative text-center text-sm after:absolute after:inset-0 after:top-1/2 after:z-0 after:flex after:items-center after:border-t">
                        <span className="bg-background text-muted-foreground relative z-10 px-2">Or continue with</span>
                     </div>

                     <a type="button" className="w-full" href="auth/google">
                        <Button type="button" variant="outline" className="w-full">
                           Continue with Google
                        </Button>
                     </a>
                  </>
               )}
            </div>
            <div className="text-center text-sm">
               Don't have an account?{' '}
               <Link href={route('register')} className="underline underline-offset-4">
                  Sign up
               </Link>
            </div>
         </form>

         {status && <div className="mb-4 text-center text-sm font-medium text-green-600">{status}</div>}
      </AuthLayout>
   );
}
