import { PageProps as InertiaPageProps } from "@inertiajs/core";

export interface PageProps extends InertiaPageProps {
  locale: string;
}

export type Language = 'ar' | 'en'
export type Theme = 'light' | 'dark'
export type SettingsButtonProps = {
    children: React.ReactNode,
    option: Language | Theme,
    isOpen: boolean,
    handleClick: (language) => void
}

export type MenuType = "mode" | "locale" | null;

export type ModeSwitcherProps = {
  isOpen: boolean;
  onToggle: () => void;
  onClose: () => void;
};
