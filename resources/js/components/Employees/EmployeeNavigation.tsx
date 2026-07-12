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
import { useCurrentUrl } from "@/hooks/use-current-url";


const items = [
    {
        title: "Overview",
        icon: LayoutDashboard,
        route: "employees.show",
    },
    {
        title: "Personal",
        icon: User,
        route: "employees.personal",
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

export default function EmployeeNavigation() {
    const { isCurrentOrParentUrl } = useCurrentUrl();

    return (
        <div className="overflow-x-auto">
            <nav className="flex min-w-max gap-2">
                {items.map((item) => {
                    const Icon = item.icon;
                    const active = isCurrentOrParentUrl(item.route);

                    return (
                        <Link
                            key={item.route}
                            href={`link`}
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
