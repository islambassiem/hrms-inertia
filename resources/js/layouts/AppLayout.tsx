import LocaleSwitcher from '@/components/Settings/LocaleSwitcher';

import logo from '@/assets/images/image.png';
import { Link } from '@inertiajs/react';
import ModeSwitcher from '@/components/Settings/ModeSwitcher';
import { useState } from 'react';
import { MenuType } from '@/types';

const App = ({ children }: { children: React.ReactNode }) => {
    const [openMenu, setOpenMenu] = useState<MenuType>(null);
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
                </div>
            </header>
            <main className={`p-6 h-[calc(100vh-${height}px)]`}>
                {children}
            </main>
        </>
    )
}

export default App
