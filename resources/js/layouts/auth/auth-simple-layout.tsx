import { Link } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';
import AppLogoIcon from '@/components/app-logo-icon';
import LanguageSwitcher from '@/components/LangSwitcher';
import ThemeSwitcher from '@/components/ThemeSwitcher';
import { home } from '@/routes';
import type { AuthLayoutProps } from '@/types';

export default function AuthSimpleLayout({
    children,
    title,
    description,
}: AuthLayoutProps) {
    const { t } = useTranslation();

    return (
        <div className="relative flex min-h-svh items-center justify-center bg-background p-6 md:p-10">
            <div className="absolute top-0 right-0 rtl:left-0 flex items-center gap-2 w-full border-b dark:border-b-white/50 shadow-md h-14 px-4">
                <ThemeSwitcher />
                <LanguageSwitcher />
            </div>
            <div className="w-full max-w-sm">
                <div className="flex flex-col gap-8">
                    <div className="flex flex-col items-center gap-4">
                        <Link
                            href={home()}
                            className="flex flex-col items-center gap-2 font-medium"
                        >
                            <div className="mb-1 flex size-12 items-center justify-center rounded-md">
                                <AppLogoIcon />
                            </div>
                            <span className="sr-only">{t(title ?? '')}</span>
                        </Link>

                        <div className="space-y-2 text-center">
                            <h1 className="text-xl font-medium">{t(title ?? '')}</h1>
                            <p className="text-center text-sm text-muted-foreground">
                                {t(description ?? '')}
                            </p>
                        </div>
                    </div>
                    {children}
                </div>
            </div>
        </div>
    );
}
