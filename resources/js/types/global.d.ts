import axios from "axios";
import type { route as routeFn } from 'ziggy-js';

declare module "*.png";
declare module "*.svg";
declare module "*.jpeg";
declare module "*.jpg";

declare global {
    interface Window {
        axios: typeof axios;
    };
    const route: typeof routeFn;
}

interface User {
    data: {
        user_id: number;
        employee_id: number;
        empid: number;
        email: string;
        name_en: string;
        name_ar: string;
        roles: string[];
        permissions: string[];
    }
}

declare module '@inertiajs/core' {
    interface PageProps extends InertiaPageProps {
        auth: User | null;
    }
}
