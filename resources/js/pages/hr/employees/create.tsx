import { useTranslation } from 'react-i18next';
import EmployeeForm from '@/components/Employees/Form/EmployeeForm';
import { EmployeeFormContext } from '@/contexts/EmployeeFormContext';
import type { ResourceList } from '@/types/hr';

interface CreateEmployeeProps {
    departments: ResourceList;
    categories: ResourceList;
    countries: ResourceList;
    genders: ResourceList;
    religions: ResourceList;
    maritalStatuses: ResourceList;
    specialNeeds: ResourceList;
}

const Create = ({
    departments,
    categories,
    countries,
    genders,
    religions,
    maritalStatuses,
    specialNeeds,
}: CreateEmployeeProps) => {
    const { t } = useTranslation();

    return (
        <div className="container mx-auto px-4 py-6">
            <div className="mb-6 flex items-center justify-between">
                <div>
                    <h1 className="text-2xl font-bold tracking-tight">
                        {t('Create Employee')}
                    </h1>

                    <p className="text-muted-foreground">
                        {t('Add a new employee to the organization')}.
                    </p>
                </div>
            </div>

            <EmployeeFormContext.Provider
                value={{
                    departments,
                    categories,
                    countries,
                    genders,
                    religions,
                    maritalStatuses,
                    specialNeeds,
                }}
            >
                <EmployeeForm />
            </EmployeeFormContext.Provider>
        </div>
    );
};

export default Create;
