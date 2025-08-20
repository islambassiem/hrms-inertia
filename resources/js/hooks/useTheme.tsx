import { Theme } from "@/types";
import { useEffect, useState } from "react";

function applyTheme(theme: Theme) {
    // Toggle the "dark" class on the <html> element
    document.documentElement.classList.toggle("dark", theme === "dark");
}

export function useTheme() {
    // Default to "light" until we know what’s stored
    const [theme, setTheme] = useState<Theme>("dark");

    // On first render, load saved theme
    useEffect(() => {
        const saved = (localStorage.getItem("theme") as Theme) || "dark";
        setTheme(saved);
        applyTheme(saved);
    }, []);

    // Whenever theme changes, apply and save it
    useEffect(() => {
        applyTheme(theme);
        localStorage.setItem("theme", theme);
    }, [theme]);

    return { theme, setTheme };
}
