import { FaUser, FaUsersCog, FaUserTie } from "react-icons/fa";

const roles = {
    employee: {
        key: "employee",
        role: "employee",
        title: "Employee Account",
        subtitle: "Manage your account",
        href: route("dashboard"),
        icon: <FaUser className="text-2xl text-surface" />,
        color: "bg-primary",
    },
    hr: {
        key: "hr",
        role: "hr",
        title: "Human Resources Account",
        subtitle: "Manage all employees",
        href: route("hr.dashboard"),
        icon: <FaUsersCog className="text-2xl text-surface" />,
        color: "bg-accent",
    },
    head: {
        key: "head",
        role: "head",
        title: "Department Head Account",
        subtitle: "Manage your department and subordinates",
        href: route("head.dashboard"),
        icon: <FaUserTie className="text-2xl text-surface" />,
        color: "bg-secondary",
    },
}

export default roles
