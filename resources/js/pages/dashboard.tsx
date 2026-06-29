import { Head, Link, usePage } from '@inertiajs/react';
import { CircleUser, MoveRight, UsersRound, ShieldCheck, FileUser } from 'lucide-react';
import { useTranslation } from 'react-i18next';
import {
    Card,
    CardAction,
    CardContent,
    CardDescription,
    CardFooter,
    CardTitle,
} from "@/components/ui/card";

interface PermissionProps {
    title: string,
    link: string,
    description?: string,
    children?: React.ReactNode
}
export default function Dashboard() {
    const { auth } = usePage().props;
    const { t } = useTranslation();

    return (
        <>
            <Head title="Dashboard" />
            <div className="font-bold mt-10 mx-4">
                <h1 className="text-sm md:text-3xl font-bold">
                    {t('Welcome back!')}, {auth.user.name}
                </h1>
                <p className="mt-2 max-w-3xl text-muted-foreground text-xs md:text-lg">
                    {t('Access your employee information, manage HR services, and use the tools available to you based on your role and permissions')}.
                </p>
            </div>
            <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 my-2 mx-4">
                <Permission
                    title={t("Personal Account")}
                    description={t("Access your personal account")}
                    link="/profile"
                >
                    <CircleUser className='size-15' />
                </Permission>

                <Permission
                    title={t("Company Employees")}
                    description={t("The contacts of the company employees")}
                    link="/profile"
                >
                    <UsersRound className='size-15' />
                </Permission>

                {auth.permissions.includes('dashboard_admin') && (
                    <Permission
                        title={t("Admin Dashboard")}
                        description={t("Access the admin dashboard")}
                        link="/admin/dashboard"
                    >
                        <ShieldCheck className="size-15" />
                    </Permission>
                )}

                {auth.permissions.includes('dashboard_hr') && (
                    <Permission
                        title={t("HR Dashboard")}
                        description={t("Access the HR dashboard")}
                        link="/admin/dashboard"
                    >
                        <FileUser className="size-15" />
                    </Permission>
                )}

            </div>
        </>
    );
}

function Permission({ title, link, description, children }: PermissionProps) {
    const { t } = useTranslation();

    return (
        <Link href={link} className='hover:scale-105 duration-500 group'>
            <Card className="cursor-pointer gap-4 hover:bg-muted ">
                <CardContent className="flex items-center gap-4">
                    <div>
                        {children}
                    </div>
                    <div className="flex flex-col text-sm">
                        <CardTitle>{title}</CardTitle>
                        <CardDescription>{description}</CardDescription>
                    </div>
                </CardContent>
                <CardFooter>
                    <CardAction className="flex items-center gap-2 ms-auto">
                        {t('Access')}
                        <MoveRight className="size-5 group-hover:translate-x-2 rtl:group-hover:-translate-x-2 duration-500 rtl:rotate-180" />
                    </CardAction>
                </CardFooter>
            </Card>

        </Link>
    );
}
