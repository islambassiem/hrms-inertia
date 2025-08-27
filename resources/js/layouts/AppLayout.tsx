import logo from '@/assets/images/image.png';
import { Link } from '@inertiajs/react';
import DropDown from '@/components/Settings/DropDown';

const App = ({ children }: { children: React.ReactNode }) => {
    const height = 90;
    return (
        <>
            <header className={`flex justify-between items-center p-6 h-[${height}px] container mx-auto`}>
                <Link href={route('home')} className='text-2xl font-bold flex gap-4 items-center'>
                    <img src={logo} alt="logo" className='w-10' />
                    <span className='font-playfair text-primary text-4xl'>HRMS</span>
                </Link>

                <DropDown />
            </header>
            <main className={`p-6 h-[calc(100vh-${height}px)]`}>
                {children}
            </main>
        </>
    )
}

export default App
