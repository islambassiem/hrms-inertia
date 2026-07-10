import { createContext } from 'react';
import type { ResourceList } from '@/types/hr';

export type EmployeeFormContextType = {
    departments: ResourceList;
    categories: ResourceList;
    countries: ResourceList;
    genders: ResourceList;
    religions: ResourceList;
    maritalStatuses: ResourceList;
    specialNeeds: ResourceList;
};

export const EmployeeFormContext = createContext<
    EmployeeFormContextType | undefined
>(undefined);
