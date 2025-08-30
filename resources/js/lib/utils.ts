import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function getArrayParam(name: string): Array<string> {
    const params = new URLSearchParams(window.location.search);
    const values: string[] = [];
    for (const [key, value] of params.entries()) {
        if (key.startsWith(name + "[")) {
            values.push(value);
        }
    }
    return values;
}
export function getStringParam(name: string): string {
    const params = new URLSearchParams(window.location.search);
    return params.get(name) ?? "";
}
