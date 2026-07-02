import { cn } from "@/lib/utils";

interface RibbonProps {
    label: string;
    variant?: "active" | "inactive";
}

export default function Ribbon({ label, variant = "active" }: RibbonProps) {
    return (
        <div
            className={cn(
                "absolute left-0 top-0 z-10 px-3 py-1 text-xs font-medium text-white",
                "rounded-br-md",
                variant === "active" && "bg-green-600",
                variant === "inactive" && "bg-red-600",
            )}
        >
            {label}
        </div>
    );
}
