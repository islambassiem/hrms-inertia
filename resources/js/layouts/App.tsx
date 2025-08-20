import LocaleSwitcher from '@/components/Settings/LocaleSwitcher';

import logo from '@/assets/images/logo.webp';
import { Link } from '@inertiajs/react';
import ModeSwitcher from '@/components/Settings/ModeSwitcher';
import { useState } from 'react';
import { MenuType } from '@/types';

const App = ({ children }: { children: React.ReactNode }) => {
    const [openMenu, setOpenMenu] = useState<MenuType>(null);
    return (
        <>
            <header className='flex justify-between items-center p-6 h-[90px] container mx-auto '>
                <Link href={route('home')} className='text-2xl font-bold text-primary flex gap-4 items-center'>
                    <img src={logo} alt="logo" className='w-44 bg-[#14406E] rounded-lg p-2 ' />
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
            <main className='p-6  h-[calc(100vh-90px)]'>
                {children}
            </main>
        </>
    )
}

export default App
