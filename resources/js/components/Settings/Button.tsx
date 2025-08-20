import { SettingsButtonProps } from "@/types";

const Button = ({ children, handleClick, option }: SettingsButtonProps) => {

    return (
        <>
            <button onClick={() => handleClick(option)}
                className='flex justify-between gap-3 py-3 hover:bg-primary-hover/10 px-4'
            >
                {children}
            </button>
        </>
    );
}

export default Button
