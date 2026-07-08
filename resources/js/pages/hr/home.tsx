import { CircleUser } from 'lucide-react';
import { useTranslation } from 'react-i18next';

import NavigationCard from '@/components/NavigationCard';

const Home = () => {
    const { t } = useTranslation();

    return (
        <>
            <div className="mx-4 my-2 mt-20 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                <NavigationCard
                    title={t('Employees')}
                    description={t(
                        'Access the employees and all their records',
                    )}
                    link="/hr/employees"
                >
                    <CircleUser className="size-15" />
                </NavigationCard>
            </div>
        </>
    );
};

export default Home;
