import { useLanguage } from '@/hooks/useLanguage';
import { HiMiniGlobeAlt } from "react-icons/hi2";
import Options from '@/components/Settings/Options';
import UnitedKingdom from '@/components/Icons/UnitedKingdom';
import Button from '@/components/Settings/Button';
import Saudi from '@/components/Icons/Saudi';
import { IoIosCheckmarkCircle } from 'react-icons/io';
import { Language, ModeSwitcherProps } from '@/types';

export default function LanguageSwitcher({ isOpen, onToggle, onClose }: ModeSwitcherProps) {
    const { language, setLanguage } = useLanguage();

    const handleClick = (language: Language) => {
        setLanguage(language)
        onClose();
    }
    return (
        <div className="relative z-999999">
            <div onClick={() => onToggle()}
                className="relative flex items-center gap-2 cursor-pointer hover:text-primary after:content-[''] after:absolute after:left-0 after:right-0 after:h-[2px] after:bg-primary after:scale-x-0 after:transition after:duration-300 hover:after:scale-x-100 after:-bottom-6"
            >
                <HiMiniGlobeAlt className='size-6' />
                <span className='font-alexandria text-lg'>
                    {language === 'ar' ? 'EN' : 'ع'}
                </span>
            </div>
            {isOpen && <Options>
                <Button option='en' isOpen={isOpen} handleClick={handleClick}>
                    <div className='flex justify-between gap-2'>
                        <UnitedKingdom className='size-6 items-center inline-flex' />
                        <span>English</span>
                    </div>
                    {language === 'en' && <IoIosCheckmarkCircle className='text-primary size-6' />}
                </Button>
                <Button option='ar' isOpen={isOpen} handleClick={handleClick}>
                    <div className='flex justify-between gap-2'>
                        <Saudi className='size-6 items-center inline-flex mt-1.5' />
                        <span className='font-alexandria'>العربية</span>
                    </div>
                    {language === 'ar' && <IoIosCheckmarkCircle className='text-primary size-6' />}
                </Button>
            </Options>}
        </div>
    );
}



