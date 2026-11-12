# Plagx Draft Preflight for Joomla

*A free academic writing tool by Plagiarism Checker X.*

**Plagx Draft Preflight is a free, open-source draft checker plugin for Joomla.** It adds a Draft Preflight tab to the article editor that checks word count and reading time, in-text citations against the reference list, punctuation and basic grammar before you publish. Use it as an **essay checker**, **word count and reading time tool**, **citation checker** or **reference list checker** for articles and academic content.

- Works with TinyMCE, CodeMirror and the plain text editor
- Runs in the browser: no external requests, nothing sent anywhere, nothing added to the public site
- APA and MLA in-text citations
- Same rules as the [plagx-preflight](https://github.com/plagiarismcheckerx/plagx-preflight) library

**[Try the live demo →](https://plagiarismcheckerx.github.io/plagx-preflight/)**

Developer downloads: [PyPI](https://pypi.org/project/plagx-preflight/) · [npm](https://www.npmjs.com/package/plagx-preflight) · [Docker Hub](https://hub.docker.com/r/plagiarismcheckerx/plagx-preflight) · [Packagist](https://packagist.org/packages/plagiarismcheckerx/plagx-preflight) · [GitHub](https://github.com/plagiarismcheckerx/plagx-preflight)

Need a quick citation online? Use the [free citation generator](https://plagiarismcheckerx.com/citation-generator?utm_source=plagx-preflight-joomla).

> Plagx Draft Preflight is a free academic writing utility by Plagiarism Checker X. It checks structure, references, punctuation and basic grammar. Plagiarism checking and AI-generated text detection are available in Plagiarism Checker X, linked at the end of this page.

## Install

1. Download `plg_system_plagxdraftpreflight.zip` from the [latest release](https://github.com/plagiarismcheckerx/plagx-preflight-joomla/releases/latest).
2. In the administrator, go to **System → Install → Extensions** and upload the zip.
3. Go to **System → Manage → Plugins**, search for **Plagx Draft Preflight** and enable it.
4. Edit an article, open the **Draft Preflight** tab and click **Check draft**.

Requires Joomla 5.0 or later (tested on 6.2) and PHP 8.1 or later.

## Configuration

Default word limits, citation style and checks are in the plugin options (**System → Manage → Plugins → System - Plagx Draft Preflight**). Word limits and citation style can also be changed in the tab for each check.

## Checks

| Group | Examples |
|---|---|
| Length & structure | Word, sentence and paragraph counts, reading time, word limits, long sentences and paragraphs |
| References | Citations with no entry in the References section, references that are never cited |
| Punctuation | Unmatched quotes and brackets, double spaces, spacing around punctuation |
| Basic grammar | Repeated words, *a* / *an*, sentence capitals, common word confusions; optional passive-voice hints |

The references section is the first heading named References, Bibliography, Works Cited, Sources or similar. Each paragraph or list item after it is one reference.

## Development

```bash
npm install
npm test           # converter and rule tests
npm run sync       # copy the latest core from ../plagx-preflight/src
```

The core library in `media/js/lib/` is copied from [plagx-preflight](https://github.com/plagiarismcheckerx/plagx-preflight) (MIT).

## Plagx Preflight - Free Draft & Grammar Checker

An open-source writing utility for students, researchers and developers. Check length, structure, citations, punctuation and basic grammar before you submit.

Developed by Plagiarism Checker X.

Plagx Preflight gives writing suggestions; it does not detect plagiarism or AI-generated text. For full document checks, explore [Text Similarity Detector](https://plagiarismcheckerx.com/?utm_source=plagx-preflight-joomla) and its [AI Content Detector](https://plagiarismcheckerx.com/ai-content-detector?utm_source=plagx-preflight-joomla).

## License

GPL-2.0-or-later © Plagiarism Checker X. The bundled Plagx Preflight core (`media/js/lib/`) is MIT licensed.
