import { cn } from '@/lib/utils';

interface RibbonProps {
    label: string;
    variant?: 'active' | 'inactive';
}

export default function Ribbon({ label, variant = 'active' }: RibbonProps) {
    return (
        <div
            className={cn(
                'absolute top-4 -left-10 w-32 -rotate-45 bg-green-600 py-1 text-center text-xs font-bold text-white shadow',
                'before:border-r-transparent',
                variant === 'active' &&
                    'bg-green-600 before:border-t-green-800',
                variant === 'inactive' && 'bg-red-600 before:border-t-red-800',
            )}
        >
            {label}
        </div>
    );
}
