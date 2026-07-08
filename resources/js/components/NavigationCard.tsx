import { Link } from '@inertiajs/react';
import { MoveRight } from 'lucide-react';
import { useTranslation } from 'react-i18next';

import {
    Card,
    CardAction,
    CardContent,
    CardDescription,
    CardFooter,
    CardTitle,
} from '@/components/ui/card';

interface NavigationCardProps {
    title: string;
    link: string;
    description?: string;
    children?: React.ReactNode;
}

const NavigationCard = ({
    title,
    link,
    description,
    children,
}: NavigationCardProps) => {
    const { t } = useTranslation();

    return (
        <Link href={link} className="group duration-500 hover:scale-105">
            <Card className="cursor-pointer gap-4 hover:bg-muted">
                <CardContent className="flex items-center gap-4">
                    <div>{children}</div>
                    <div className="flex flex-col text-sm">
                        <CardTitle>{title}</CardTitle>
                        <CardDescription>{description}</CardDescription>
                    </div>
                </CardContent>
                <CardFooter>
                    <CardAction className="ms-auto flex items-center gap-2">
                        {t('Access')}
                        <MoveRight className="size-5 duration-500 group-hover:translate-x-2 rtl:rotate-180 rtl:group-hover:-translate-x-2" />
                    </CardAction>
                </CardFooter>
            </Card>
        </Link>
    );
};

export default NavigationCard;
