import LocaleSwitcher from '@/components/Settings/LocaleSwitcher';

import logo from '@/assets/images/image.png';
import { Link, useForm, usePage } from '@inertiajs/react';
import ModeSwitcher from '@/components/Settings/ModeSwitcher';
import { useState } from 'react';
import { MenuType } from '@/types';
import Button from '@/components/ui/Button';
import { VscSignOut } from 'react-icons/vsc';
import { t } from 'i18next';

const App = ({ children }: { children: React.ReactNode }) => {
    const [openMenu, setOpenMenu] = useState<MenuType>(null);
    const { auth } = usePage().props;
    const { post } = useForm();
    const height = 90;
    return (
        <>
            <header className={`flex justify-between items-center p-6 h-[${height}px] container mx-auto`}>
                <Link href={route('home')} className='text-2xl font-bold flex gap-4 items-center'>
                    <img src={logo} alt="logo" className='w-10' />
                    <span className='font-playfair text-primary text-4xl'>HRMS</span>
                </Link>
                <div className='flex gap-4 items-center'>
                    <ModeSwitcher
                        isOpen={openMenu === "mode"}
                        onToggle={() => setOpenMenu(openMenu === "mode" ? null : "mode")}
                        onClose={() => setOpenMenu(null)}
                    />
                    <LocaleSwitcher
                        isOpen={openMenu === "locale"}
                        onToggle={() => setOpenMenu(openMenu === "locale" ? null : "locale")}
                        onClose={() => setOpenMenu(null)}
                    />
                    {auth !== null && (<form action={route('logout')} method="post" onSubmit={(e) => { e.preventDefault(); post(route('logout')) }}>
                        <Button variant="danger" type="submit" className='bg-danger'>
                            <VscSignOut className="rtl:rotate-180 text-bg" />
                            <span className="text-bg text-sm">{t('Logout')}</span>
                        </Button>
                    </form>)}
                </div>
            </header>
            <main className={`p-6 h-[calc(100vh-${height}px)]`}>
                {children}
            </main>
        </>
    )
}

export default App
