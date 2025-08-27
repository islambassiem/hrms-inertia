import App from "@/layouts/AppLayout";
import { usePage } from "@inertiajs/react";
import { t } from "i18next";


const Home = () => {
    const { auth } = usePage().props;
    return (
        <App>
            <div className="card">
                <h1 className="text-2xl font-bold text-primary">{t('Hello World')}</h1>
                <p className="text-text-muted">{auth?.data.name_en}</p>
                <p className="text-text-muted">{auth?.data.email}</p>
                {auth?.data.roles.includes('hr') && <>
                    <div>
                        I am an hr
                    </div>
                </>}
                {auth?.data.roles.includes('head') && <>
                    <div>
                        I am a head
                    </div>
                </>}
                I am an employee
            </div>
        </App>
    );
};

export default Home;
