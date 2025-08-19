import { useLanguage } from '@/hooks/useLanguage';
import { useTranslation } from 'react-i18next';
const languages = [
    { code: 'en', label: 'English' },
    { code: 'ar', label: 'Arabic' },
];

export default function LanguageSwitcher() {
    const { t } = useTranslation();
    const { language, setLanguage } = useLanguage();

    return (
        <div className="flex items-center space-x-2">
            <label htmlFor="lang-select" className="text-sm">
                {t("language")}:
            </label>
            <select
                id="lang-select"
                onChange={(e) => setLanguage(e.target.value)}
                value={language}
                className="border px-2 py-1 rounded text-sm"
            >
                {languages.map((lang) => (
                    <option key={lang.code} value={lang.code}>
                        {lang.label}
                    </option>
                ))}
            </select>
        </div>
    );
}
