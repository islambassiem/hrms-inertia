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
} from "@/components/ui/card";

interface NavigationCardProps {
    title: string,
    link: string,
    description?: string,
    children?: React.ReactNode
}


const NavigationCard = ({ title, link, description, children }: NavigationCardProps) => {
    const { t } = useTranslation();

    return (
        <Link href={link} className='hover:scale-105 duration-500 group'>
            <Card className="cursor-pointer gap-4 hover:bg-muted ">
                <CardContent className="flex items-center gap-4">
                    <div>
                        {children}
                    </div>
                    <div className="flex flex-col text-sm">
                        <CardTitle>{title}</CardTitle>
                        <CardDescription>{description}</CardDescription>
                    </div>
                </CardContent>
                <CardFooter>
                    <CardAction className="flex items-center gap-2 ms-auto">
                        {t('Access')}
                        <MoveRight className="size-5 group-hover:translate-x-2 rtl:group-hover:-translate-x-2 duration-500 rtl:rotate-180" />
                    </CardAction>
                </CardFooter>
            </Card>
        </Link>
    );
};

export default NavigationCard;
