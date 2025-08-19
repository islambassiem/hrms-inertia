import { router } from "@inertiajs/react";
import { useEffect, useState } from "react";
import { useTranslation } from "react-i18next";
import { usePage } from '@inertiajs/react';
import { PageProps } from "@/layouts/App";

export function useLanguage() {
    const { locale: serverLocale } = usePage<PageProps>().props;
    const { i18n } = useTranslation();
    const [lang, setLang] = useState(() => {
        return serverLocale || localStorage.getItem("locale") || "ar";
    });

    useEffect(() => {
        if (serverLocale && serverLocale !== lang) {
            setLang(serverLocale);
            localStorage.setItem("locale", serverLocale);
        }
        const dir = lang === "ar" ? "rtl" : "ltr";
        i18n.changeLanguage(lang);

        document.documentElement.lang = lang;
        document.documentElement.dir = dir;
    }, [i18n, lang, serverLocale]);

    const setLanguage = (newLang: string) => {
        if (newLang === lang) return; // Prevent unnecessary updates

        const dir = newLang === "ar" ? "rtl" : "ltr";

        setLang(newLang);
        i18n.changeLanguage(newLang);
        localStorage.setItem("locale", newLang);
        localStorage.setItem("dir", dir);

        document.documentElement.lang = newLang;
        document.documentElement.dir = dir;

        // Make the server request
        router.post(route("locale"), {
            locale: newLang
        });
    };

    return {
        language: lang,
        setLanguage,
    };
}
