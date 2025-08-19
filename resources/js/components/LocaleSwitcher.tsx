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
                className="w-full max-w-xs rounded-md border border-border bg-surface px-3 py-2 text-sm text-text shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/50 transition-colors"
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
