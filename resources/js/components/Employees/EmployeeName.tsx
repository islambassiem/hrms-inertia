import { usePage } from '@inertiajs/react';
import { useClipboard } from '@/hooks/use-clipboard';
import { cn } from '@/lib/utils';

interface Props {
    name_en: string;
    name_ar: string;
}

export function EmployeeName({ name_en, name_ar }: Props) {
    const locale = usePage().props.locale;
    const [copiedText, copy] = useClipboard();

    const primary = locale === 'ar' ? name_ar : name_en;
    const secondary = locale === 'ar' ? name_en : name_ar;

    return (
        <div className="text-center">
            {/* Primary name */}
            <h3
                className="truncate text-lg leading-tight font-semibold"
                title={primary}
                onClick={() => copy(primary)}
            >
                {primary}
            </h3>

            {/* Secondary name */}
            <p
                className={cn(
                    'mt-1 text-sm text-muted-foreground',
                    locale === 'ar' && 'font-arabic',
                )}
                title={secondary}
                onClick={() => copy(secondary)}
            >
                {secondary}
            </p>
        </div>
    );
}

export default EmployeeName;
