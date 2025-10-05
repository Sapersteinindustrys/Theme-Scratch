#!/bin/bash
# Generate translation template
# Usage: ./scripts/make-pot.sh

wp i18n make-pot . languages/aetheria.pot --domain=aetheria
