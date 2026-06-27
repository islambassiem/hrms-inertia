import { router, usePage } from '@inertiajs/react';
import { useEffect } from 'react';
import { useTranslation } from "react-i18next";

const languages = [
    { code: 'en', label: 'English' },
    { code: 'ar', label: 'Arabic' },
]


export default function LanguageSwitcher() {
    const { t, i18n } = useTranslation();
    const { locale } = usePage<{ locale: string }>().props;

    const changeLanguage = (e: React.ChangeEvent<HTMLSelectElement>) => {
        const selectedLang = e.target.value;

        router.post(`/language/${selectedLang}`, {}, {
            preserveScroll: true,
            preserveState: true,
        });

        localStorage.setItem('lang', selectedLang);
    }

    useEffect(() => {
        if (locale) {
            i18n.changeLanguage(locale);
            document.documentElement.dir = i18n.dir(i18n.language);
            document.documentElement.lang = i18n.language;
        }
    }, [i18n, locale]);

    return (
        <div>
            <label>{t('Language')}</label>
            <select value={i18n.language} onChange={changeLanguage}>
                {languages.map((lang) => (
                    <option key={lang.code} value={lang.code}>
                        {lang.label}
                    </option>
                ))}
            </select>
        </div>
    );
}
