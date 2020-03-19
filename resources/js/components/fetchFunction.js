export const getTopSales = (page = 1) => {
    const headerGet = {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*"
        },
        method: 'get'
    }
    return fetch('/topsales?page='+page,headerGet).then(data => data.json()).catch((error) => console.log(error))
}
