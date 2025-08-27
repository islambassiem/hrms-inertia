import { t } from "i18next";
import { useEffect, useRef, useState } from "react";
import { CiSettings } from "react-icons/ci";
import { GrPowerShutdown } from "react-icons/gr";
import Saudi from "../Icons/Saudi";
import UnitedKingdom from "../Icons/UnitedKingdom";
import { useLanguage } from "@/hooks/useLanguage";
import { useTheme } from "@/hooks/useTheme";
import { useForm, usePage } from "@inertiajs/react";

const DropDown = () => {
    const [isOpen, setIsOpen] = useState(false)
    const menuRef = useRef<HTMLDivElement>(null);
    const { language, setLanguage } = useLanguage();
    const { theme, setTheme } = useTheme();
    const { post } = useForm();
    const { auth } = usePage().props

    useEffect(() => {
        function handleClickOutside(event: MouseEvent) {
            if (menuRef.current && !menuRef.current.contains(event.target as Node)) {
                setIsOpen(false);
            }
        }

        if (isOpen) {
            document.addEventListener("mousedown", handleClickOutside);
        } else {
            document.removeEventListener("mousedown", handleClickOutside);
        }

        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, [isOpen]);


    return (
        <section className="relative" ref={menuRef}>
            <div
                className="relative bg-primary/15 p-0.5 rounded-full flex justify-center items-center"
                onClick={() => setIsOpen(!isOpen)}
            >
                <CiSettings className="size-10 animate-spin" />
            </div>
            {isOpen && (
                <div
                    className="fixed inset-0 bg-black/40 backdrop-blur-sm z-40"
                    onClick={() => setIsOpen(false)}
                >
                    <div className="absolute z-50 top-10 -right-5 rtl:right-auto rtl:-left-5 w-60 p-2 bg-surface mx-4 shadow-xl rounded-2xl border border-border">

                        {/* Theme Section */}
                        <section className="px-2 py-2">
                            <p className="text-xs uppercase tracking-wide text-muted-foreground mb-2">{t("Theme")}</p>
                            <div className="flex gap-2">
                                <button
                                    className={`flex-1 py-2 rounded-lg bg-muted hover:bg-primary hover:text-white transition ${theme === "light" ? "bg-primary" : ""}`}
                                    onClick={() => setTheme("light")}
                                >
                                    🌞
                                </button>
                                <button
                                    className={`flex-1 py-2 rounded-lg bg-muted hover:bg-primary hover:text-white transition ${theme === "dark" ? "bg-primary" : ""}`}
                                    onClick={() => setTheme("dark")}
                                >
                                    🌙
                                </button>
                            </div>
                        </section>

                        <hr className="my-2 border-border" />

                        {/* Language Section */}
                        <section className="px-2 py-3">
                            <p className="text-xs uppercase tracking-wide text-muted-foreground mb-2">{t("Language")}</p>
                            <div className="flex gap-2">
                                <button
                                    className={`flex-1 px-2 rounded-lg bg-muted hover:bg-primary hover:text-white transition flex justify-center items-center gap-2 ${language === "en" ? "bg-primary" : ""}`}
                                    onClick={() => setLanguage("en")}
                                >
                                    <UnitedKingdom />
                                </button>
                                <button
                                    className={`flex-1 p-2 rounded-lg bg-muted hover:bg-primary hover:text-white transition flex justify-center items-center gap-2 ${language === "ar" ? "bg-primary" : ""}`}
                                    onClick={() => setLanguage("ar")}
                                >
                                    <Saudi className="size-6 mt-1.5" />
                                </button>
                            </div>
                        </section>

                        {/* Logout */}

                        {auth !== null && (
                            <>
                                <hr className="my-2 border-border" />
                                <button
                                    className="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary cursor-pointer transition"
                                    onClick={() => post(route('logout'))}>
                                    <GrPowerShutdown className="text-lg" />
                                    {t("Logout")}
                                </button>
                            </>
                        )}
                    </div>

                </div>)}
        </section>
    )
}

export default DropDown
