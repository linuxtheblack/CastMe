/*
eslint

consistent-return: 0,
no-undef: 0,
*/

async function getLocale(supportedLanguages) {
  try {
    const response = await fetch('/api/locale');
    const result = await response.json();

    if (Object.keys(supportedLanguages).includes(result.lang)) {
      return result.lang;
    }
  } catch (err) {
    // console.log(err);
  }
}

export default getLocale;