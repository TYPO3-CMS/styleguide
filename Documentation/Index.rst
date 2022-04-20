.. include:: /Includes.rst.txt

================
TYPO3 Styleguide
================

:Extension key:
   styleguide

:Package name:
   typo3/cms-styleguide

:Version:
   |release|

:Language:
   en

:Author:
   TYPO3 Core Team

:License:
   This document is published under the
   `Creative Commons BY 4.0 <https://creativecommons.org/licenses/by/4.0/>`__
   license.

:Rendered:
   |today|

----

This style guide is a showcase for many TYPO3 backend features that are useful
for developing your own extensions:

* A number of snippets showing how to use standard backend UI elements like
  tables, buttons, boxes or notifications.
* A large number of examples of backend edit forms, showing many features of the
  :doc:`TCA <t3tca:Index>`.

It provides a backend module that hooks into the 'help' menu of the top toolbar
of the backend and can also create a page tree to show examples.

This extension is being developed close to core: Additions and deprecations of
TYPO3 core features used in this extension will be considered here in a timely
manner.

----

**Table of Contents:**

.. contents::
   :backlinks: top
   :depth: 1
   :local:


Usages
======

*  The extension is interesting for **backend extension developers** as a
   reference to see how casual stuff like buttons and other HTML related things
   are solved or used in the backend, and to copy+paste solutions. In addition,
   the TCA examples are a nearly complete show case of the
   :ref:`Form Engine <t3coreapi:FormEngine>` (editing records in the backend).
   Developers will see new things they didn't know before. Guaranteed!

*  The extension may be of interest to **technical project managers** to get an
   idea of what backend editing can do "out-of-the-box" and what parts can be
   sold to customers without imposing expensive implementation burdens on
   developers.

*  Styleguide is a require-dev dependency of the
   `TYPO3 mono repository <https://github.com/typo3/typo3>`__. It is used by
   **core developers** to test changes to JavaScript, HTML, and PHP code to
   verify that the layout or functionality of backend modules is not affected.
   The extension is also used in core acceptance tests to verify that Form
   Engine details are not broken during core patch development.

*  The style guide is used in the official TYPO3 documentation to provide
   examples, screenshots and possible uses of core features. In particular, the
   :doc:`TCA reference <t3tca:Index>` relies heavily on it.

*  Styleguide comes with a simple setup of unit, functional and acceptance tests
   that are executed locally or via the GitHub workflow "tests.yml". They
   can be used as copy+paste boilerplate in custom extensions. Furthermore,
   these test setups serve as the basis of the
   :ref:`testing pages <t3coreapi:testing>` of the official TYPO3 documentation.


Installation
============

Styleguide is a TYPO3 extension for the TYPO3 backend. It appears as a backend
module in the "Help" section of the top toolbar. After the initial installation
it is advisable to let Styleguide create a sample page tree with records by
clicking on the button "TCA / records -> Create styleguide page tree with data"
and wait a few seconds until the system has processed the data.

Composer
--------

With :ref:`composer based <t3start:install>` TYPO3 installations, Styleguide is
easily added to the project.

TYPO3 v11 based project:

.. code-block:: bash

   composer require --dev typo3/cms-styleguide:^11

TYPO3 v10 based project:

.. code-block:: bash

   composer require --dev typo3/cms-styleguide:^10
   bin/typo3 extension:activate styleguide

TYPO3 Extension Repository
--------------------------

For non-composer projects, the extension is available in the TER under the
extension key `styleguide` and can be installed via the Extension Manager.


Running tests
=============

Styleguide comes with a simple demo set of unit, functional and acceptance tests.
It relies on the runTests.sh script which is a simplified version of a similar
script from the TYPO3 core. Find detailed usage examples by executing

.. code-block:: bash

   Build/Scripts/runTests.sh -h

and have a look at :file:`.github/workflows/tests.yml` to see how this is used
in CI.

Example usage:

.. code-block:: bash

   Build/Scripts/runTests.sh -s composerUpdate
   Build/Scripts/runTests.sh -s unit


Tagging and releasing
=====================

The package available on `Packagist <https://packagist.org/packages/typo3/cms-styleguide>`__
is updated via the implemented Github hook. Releases in the TER are created by
the Github workflow "publish.yml" if a commit with a release tag was previously
marked with `Tailor <https://github.com/TYPO3/tailor>`__. The message of the
commit is used as TER upload comment.

Example:

.. code-block:: bash

   composer install
   .Build/bin/tailor set-version 11.0.3
   git commit -am "[RELEASE] 11.0.3 Bug fixes and improved core v11 compatibility"
   git tag 11.0.3
   git push
   git push --tags


Legal
=====

This project is released under GPLv2+ license. See LICENSE.txt for details.

* The "tree" icon is from `Yusuke Kamiyamane <https://p.yusukekamiyamane.com/>`__.
* Placeholder texts are from `Bacon Ipsum <https://baconipsum.com/>`__.
