import axios from "axios";
import type { route as routeFn } from 'ziggy-js';

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
        english_name: string;
        arabic_name: string;
        roles: string[];
        permissions: string[];
    }
}

declare module '@inertiajs/core' {
    interface PageProps extends InertiaPageProps {
        auth: User | null;
    }
}
