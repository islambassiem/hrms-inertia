import { cn } from "@/lib/utils";


interface ButtonProps {
    children?: React.ReactNode,
    type?: "button" | "submit" | "reset";
    className?: string,
    variant?: string
}

const Button = ({ type = 'button', children, className, variant = 'primary' }: ButtonProps) => {
    const bg = 'bg-' + variant;
    return (
        <button
            type={type}
            className={cn(`${bg}
                flex items-center justify-center gap-2
                hover:${bg}/80
                py-2 px-4 rounded-lg
                transition-colors duration-300
                color-text cursor-pointer
                disabled:opacity-30 disabled:cursor-not-allowed
                disabled:hover:${bg}`
                ,className)}
        >
            {children}
        </button>
    )
}

export default Button
