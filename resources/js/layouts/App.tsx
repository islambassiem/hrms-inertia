import LocaleSwitcher from '@/components/LocaleSwitcher';
import { useTheme } from '@/hooks/useTheme';
import { PageProps } from '@/types';
import { Link, usePage } from '@inertiajs/react'
import { t } from 'i18next'

const App = ({ children }: { children: React.ReactNode }) => {
    const { theme, setTheme } = useTheme();
    const { locale } = usePage<PageProps>().props;
    return (
        <>
            <header className='flex justify-between items-center p-6 h-[60px] bg-gray-200'>
                <nav>
                    <div className='flex gap-5'>
                        <p><Link href={route('home')}>{t('Home')}</Link></p>
                        <p><Link href={route('about')}>{t('About')}</Link></p>
                    </div>
                </nav>
                <div className='flex gap-5'>
                    <button onClick={() => setTheme("dark")} className={`${theme === 'dark' ? 'bg-blue-400' : ''}`}>dark</button>
                    <button onClick={() => setTheme("light")} className={`${theme === 'light' ? 'bg-blue-400' : ''}`}>light</button>
                </div>
                <div>
                    Laravel Locale is {locale}
                </div>
                <LocaleSwitcher />
            </header>
            <main className='p-6 bg-slate-100 h-[calc(100vh-60px)]'>
                {children}
            </main>
        </>
    )
}

export default App
