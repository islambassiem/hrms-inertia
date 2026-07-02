import { Head, usePage } from '@inertiajs/react';
import { CircleUser, UsersRound, ShieldCheck, FileUser } from 'lucide-react';
import { useTranslation } from 'react-i18next';
import NavigationCard from "@/components/NavigationCard";

export default function Dashboard() {
    const { auth } = usePage().props;
    const { t } = useTranslation();

    return (
        <>
            <Head title={t('Dashboard')} />
            <div className="font-bold mt-10 mx-4">
                <h1 className="text-sm md:text-3xl font-bold">
                    {t('Welcome back!')}, {auth.user.name}
                </h1>
                <p className="mt-2 max-w-3xl text-muted-foreground text-xs md:text-lg">
                    {t('Access your employee information, manage HR services, and use the tools available to you based on your role and permissions')}.
                </p>
            </div>
            <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 my-2 mx-4">
                <NavigationCard
                    title={t("Personal Account")}
                    description={t("Access your personal account")}
                    link="/profile"
                >
                    <CircleUser className='size-15' />
                </NavigationCard>

                <NavigationCard
                    title={t("Company Employees")}
                    description={t("The contacts of the company employees")}
                    link="/profile"
                >
                    <UsersRound className='size-15' />
                </NavigationCard>

                {auth.permissions.includes('dashboard_admin') && (
                    <NavigationCard
                        title={t("Admin Dashboard")}
                        description={t("Access the admin dashboard")}
                        link="/admin/dashboard"
                    >
                        <ShieldCheck className="size-15" />
                    </NavigationCard>
                )}

                {auth.permissions.includes('dashboard_hr') && (
                    <NavigationCard
                        title={t("HR Dashboard")}
                        description={t("Access the HR dashboard")}
                        link="/hr/dashboard"
                    >
                        <FileUser className="size-15" />
                    </NavigationCard>
                )}

            </div>
        </>
    );
}
