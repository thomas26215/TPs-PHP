/*const hello = () => {
    console.log("Hello");
};
const ok = () => {
    console.log("Ok");
};
const bye = () => {
    console.log("Bye");
};

const main = (func1, func2, func3) => {
    func1();
    func2();
    func3();
};

// Appel avec des arguments
main(hello, ok, bye);*/

/*const hello = () => {
    console.log("Hello");
};
const ok = () => {
    console.log("Ok");
};
const bye = () => {
    console.log("Bye");
};

const main = () => {
    hello();
    ok();
    bye();
};

main();*/

/*const hello = () => {
    console.log("Hello");
};
const ok = () => {
    console.log("Ok");
};
const bye = () => {
    console.log("Bye");
};

const aCall = (callback) => {
    const maxTime = 10000;
    setTimeout(callback, Math.random() * maxTime);
};

const aHello = () => {
    aCall(() => {
        hello();
        aOk();
    });
};
const aOk = () => {
    aCall(() => {
        ok();
        aBye();
    });
};
const aBye = () => {
    aCall(bye);
};

const main = () => {
    aHello();
};

main();
*/

// Fonction simulant une opération asynchrone
const fetchData = (id) => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (id === 1) {
                resolve({ id: 1, name: "Alice" });
            } else if (id === 2) {
                resolve({ id: 2, name: "Bob" });
            } else {
                reject(new Error("Utilisateur non trouvé"));
            }
        }, 1000);
    });
};

// Fonction utilisant la promesse
const getUserInfo = (id) => {
    console.log(`Recherche de l'utilisateur avec l'ID ${id}...`);

    fetchData(id)
        .then((user) => {
            console.log("Utilisateur trouvé :", user.name);
            return fetchData(2); // Chaînage d'une autre promesse
        })
        .then((friend) => {
            console.log(`Meilleur ami de ${friend.name} trouvé !`);
        })
        .catch((error) => {
            console.error("Erreur :", error.message);
        })
        .finally(() => {
            console.log("Opération terminée");
        });
};

// Appel de la fonction
getUserInfo(1);
