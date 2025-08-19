import App from "@/layouts/App";
import { t } from "i18next";

const Home = () => {
    return (
        <App>
            <div className="bg-surface text-text p-6 rounded-lg border border-border">
                <h1 className="text-2xl font-bold text-primary">{t('Hello World')}</h1>
                <p className="text-text-muted">{t('This is a semantic palette demo')}</p>

                <button className="btn btn-primary mt-4">{t('Save')}</button>
                <button className="btn btn-secondary mt-4 ms-2">{t('Cancel')}</button>
            </div>
        </App>
    );
};

export default Home;
