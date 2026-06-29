import saFlag from "@assets/svg/sa.svg";
import usFlag from "@assets/svg/us.svg";
import { router, usePage } from "@inertiajs/react";
import { Check } from "lucide-react";
import { useEffect } from "react";
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
import { cn } from "@/lib/utils";


const languages = [
    {
        code: "en",
        label: "English",
        flag: usFlag,
    },
    {
        code: "ar",
        label: "العربية",
        flag: saFlag, // or 🇦🇪 if that's a better fit for your audience
    },
];

export default function LanguageSwitcher() {
    const { t, i18n } = useTranslation();
    const { locale } = usePage<{ locale: string }>().props;

    const currentLanguage =
        languages.find((l) => l.code === i18n.language) ?? languages[0];

    const changeLanguage = (lang: string) => {
        i18n.changeLanguage(lang);

        localStorage.setItem("lang", lang);

        router.post(`/language/${lang}`, {}, {
            preserveScroll: true,
            preserveState: true,
        });
    };

    useEffect(() => {
        i18n.changeLanguage(locale);
        document.documentElement.lang = locale;
        document.documentElement.dir = i18n.dir(locale);
    }, [i18n, locale]);

    return (
        <DropdownMenu>
            <DropdownMenuTrigger asChild>
                <Button variant="ghost" size="icon">
                    <img
                        src={currentLanguage.flag}
                        alt=""
                        className="h-7 w-7 rounded-md"
                        aria-hidden
                    />
                    <span className="sr-only">{t("Language")}</span>
                </Button>
            </DropdownMenuTrigger>

            <DropdownMenuContent align={locale === "en" ? "end" : "start"} className="w-48">
                <DropdownMenuLabel>
                    {t("Language")}
                </DropdownMenuLabel>

                <DropdownMenuSeparator />

                {languages.map((lang) => (
                    <DropdownMenuItem
                        key={lang.code}
                        onClick={() => changeLanguage(lang.code)}
                        className="gap-3"
                    >
                        <Check
                            className={cn(
                                "size-4",
                                i18n.language === lang.code ? "opacity-100" : "opacity-0"
                            )}
                        />

                        <img
                            src={lang.flag}
                            alt=""
                            className="h-5 w-5 rounded-sm"
                            aria-hidden
                        />

                        <span>{lang.label}</span>
                    </DropdownMenuItem>
                ))}
            </DropdownMenuContent>
        </DropdownMenu>
    );
}
