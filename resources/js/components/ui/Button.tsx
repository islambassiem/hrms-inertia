import { cn } from "@/lib/utils";


interface ButtonProps {
    children?: React.ReactNode,
    type?: "button" | "submit" | "reset";
    className?: string,
    variant?: "primary" | "secondary" | "accent" | "info" | "danger" | "warning" | "success" | "neutral",
    disabled?: boolean
}

const Button = ({ type = 'button', children, className, variant = 'primary', disabled = false }: ButtonProps) => {
    const variants = {
        primary: 'bg-primary hover:bg-primary-hover disabled:hover:bg-primary',
        secondary: 'bg-secondary hover:bg-secondary-hover disabled:hover:bg-secondary',
        accent: 'bg-accent hover:bg-accent-hover disabled:hover:bg-accent',
        info: 'bg-info hover:bg-info-hover disabled:hover:bg-info',
        danger: 'bg-danger hover:bg-danger-hover disabled:hover:bg-danger',
        warning: 'bg-warning hover:bg-warning-hover disabled:hover:bg-warning',
        success: 'bg-success hover:bg-success-hover disabled:hover:bg-success',
        neutral: 'bg-neutral hover:bg-neutral-hover disabled:hover:bg-neutral'
    }
    return (
        <button
            disabled={disabled}
            type={type}
            className={cn(variants[variant],
                `flex items-center justify-center gap-2
                py-2 px-4 rounded-lg
                transition-colors duration-300
                color-text cursor-pointer
                disabled:opacity-30 disabled:cursor-not-allowed`
                ,className)}
        >
            {children}
        </button>
    )
}

export default Button
