import { useTheme } from '@/hooks/useTheme';
import { SiNintendoswitch } from "react-icons/si";
import { RxMoon } from "react-icons/rx";
import { RxSun } from "react-icons/rx";
import { t } from 'i18next';
import Options from './Options';
import Button from './Button';
import { IoIosCheckmarkCircle } from 'react-icons/io';
import { ModeSwitcherProps, Theme } from '@/types';

const ModeSwitcher = ({ isOpen, onToggle, onClose }: ModeSwitcherProps) => {
    const { theme, setTheme } = useTheme();

    const handleClick = (theme: Theme) => {
        setTheme(theme)
        onClose();
    }
    return (
        <div className="relative z-999999">
            <div onClick={() => onToggle()}
                className="relative flex items-center gap-3 cursor-pointer hover:text-primary after:content-[''] after:absolute after:left-0 after:right-0 after:h-[2px] after:bg-primary after:scale-x-0 after:transition after:duration-300 hover:after:scale-x-100 after:-bottom-6"
            >
                <SiNintendoswitch className='size-4' />
                <span  className='font-bold text-lg'>
                    {theme === 'dark' ? t('Dark') : t('Light')}
                </span>
            </div>
            {isOpen && <Options>
                <Button option='dark' isOpen={isOpen} handleClick={handleClick}>
                    <div className='flex justify-between gap-2'>
                        <RxMoon className='size-8' />
                        <span className='font-bold text-lg'>{t('Dark')}</span>
                    </div>
                    {theme === 'dark' && <IoIosCheckmarkCircle className='text-primary size-6' />}
                </Button>
                <Button option='light' isOpen={isOpen} handleClick={handleClick}>
                    <div className='flex justify-between gap-2'>
                        <RxSun className='size-8' />
                        <span  className='font-bold text-lg'>{t('Light')}</span>
                    </div>
                    {theme === 'light' && <IoIosCheckmarkCircle className='text-primary size-6' />}
                </Button>
            </Options>}
        </div>
    )
}

export default ModeSwitcher



