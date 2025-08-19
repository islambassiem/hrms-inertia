import { PageProps as InertiaPageProps } from "@inertiajs/core";

export interface PageProps extends InertiaPageProps {
  locale: string;
}
