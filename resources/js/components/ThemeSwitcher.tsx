import { usePage } from "@inertiajs/react";
import { Check, Monitor, Moon, Sun } from "lucide-react";
import { useTranslation } from "react-i18next";
import { Button } from "@/components/ui/button";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { useAppearance } from "@/hooks/use-appearance";
import { cn } from "@/lib/utils";


export default function ThemeSwitcher() {
    const { appearance, updateAppearance } = useAppearance();
    const { t } = useTranslation();
    const { locale } = usePage<{ locale: string }>().props;

    const themes = [
        {
            value: "light",
            label: t("Light"),
            icon: Sun,
        },
        {
            value: "dark",
            label: t("Dark"),
            icon: Moon,
        },
        {
            value: "system",
            label: t("System"),
            icon: Monitor,
        },
    ] as const;

    const currentTheme =
        themes.find((t) => t.value === appearance) ?? themes[2];

    const CurrentIcon = currentTheme.icon;

    return (
        <DropdownMenu>
            <DropdownMenuTrigger asChild>
                <Button variant="ghost" size="icon">
                    <CurrentIcon className="size-5" />
                    <span className="sr-only">Theme</span>
                </Button>
            </DropdownMenuTrigger>

            <DropdownMenuContent align={locale === "en" ? "end" : "start"} className="w-48">
                <DropdownMenuLabel>{t('Theme')}</DropdownMenuLabel>

                <DropdownMenuSeparator />

                {themes.map((item) => {
                    const Icon = item.icon;

                    return (
                        <DropdownMenuItem
                            key={item.value}
                            onClick={() => updateAppearance(item.value)}
                            className="gap-3"
                        >
                            <Check
                                className={cn(
                                    "size-4",
                                    appearance === item.value
                                        ? "opacity-100"
                                        : "opacity-0"
                                )}
                            />

                            <Icon className="size-4" />

                            <span>{item.label}</span>
                        </DropdownMenuItem>
                    );
                })}
            </DropdownMenuContent>
        </DropdownMenu>
    );
}
