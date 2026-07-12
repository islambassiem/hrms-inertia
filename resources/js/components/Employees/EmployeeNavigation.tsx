import { Link } from "@inertiajs/react";
import clsx from "clsx";
import {
    LayoutDashboard,
    User,
    BriefcaseBusiness,
    GraduationCap,
    Building2,
    FolderClosed,
    Wallet,
    Clock3,
    NotebookPen,
} from "lucide-react";
import { show as overview} from "@/actions/App/Http/Controllers/Hr/EmployeeController";
import { show as personal} from "@/actions/App/Http/Controllers/Hr/PersonalInfoController";
import { useCurrentUrl } from "@/hooks/use-current-url";
import type { EmployeeHeaderProps } from "@/types/hr";



export default function EmployeeNavigation({ employee }: { employee: EmployeeHeaderProps }) {
    const { isCurrentOrParentUrl } = useCurrentUrl();

    const items = [
        {
            title: "Overview",
            icon: LayoutDashboard,
            route: overview(employee.data.id),
        },
        {
            title: "Personal",
            icon: User,
            route: personal(employee.data.id),
        },
        {
            title: "Employment",
            icon: BriefcaseBusiness,
            route: "employees.employment",
        },
        {
            title: "Qualifications",
            icon: GraduationCap,
            route: "employees.qualifications",
        },
        {
            title: "Experience",
            icon: Building2,
            route: "employees.experience",
        },
        {
            title: "Documents",
            icon: FolderClosed,
            route: "employees.documents",
        },
        {
            title: "Payroll",
            icon: Wallet,
            route: "employees.payroll",
        },
        {
            title: "Attendance",
            icon: Clock3,
            route: "employees.attendance",
        },
        {
            title: "Notes",
            icon: NotebookPen,
            route: "employees.notes",
        },
    ];
    console.log(employee);

    return (
        <div className="overflow-x-auto">
            <nav className="flex min-w-max gap-2">
                {items.map((item, index) => {
                    const Icon = item.icon;
                    const active = isCurrentOrParentUrl(item.route);

                    return (
                        <Link
                            key={index}
                            href={item.route}
                            className={clsx(
                                "inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition-colors whitespace-nowrap",
                                active
                                    ? "bg-primary text-primary-foreground"
                                    : "text-muted-foreground hover:bg-muted hover:text-foreground"
                            )}
                        >
                            <Icon className="h-4 w-4" />
                            {item.title}
                        </Link>
                    );
                })}
            </nav>
        </div>
    );
}
