/**
* Copyright (c) 2014 Ondrej Donek, <ondrejd@gmail.com>.
* See the file LICENSE.txt for licensing information.
*/
jQuery(document).ready(function() {

	/** @var {Number} Default time for the toys move. */
	var DEFAULT_TOYS_MOVEMENT_TIME = 800;
	/** @var {Number} Height of the browser window. */
	var gWinHeight = jQuery(window).height();
	/** @var {Number} Width of the browser window. */
	var gWinWidth = jQuery(window).width();
	/** @var {Object} Status of a current footer page. */
	var gFooterPageStatus = { isPageOpen: false, openPageId: null };
	/** @var {Number} Position for price labels from the border of the screen on X-axis. */
	var gPriceLabelPosX = Math.ceil((gWinWidth / 2) - 260);
	/** @var {Number} Total count of panels with pairs of toys. */
	var gToysPairsCount = jQuery(".toys-pair").length;
	/** @var {Number} Index of currently displayed pair of toys. */
	var gCurrentToysPair = 0;
	/** @var {Number} Width in pixels of panel with pairs of toys. */
	var gPairWidth = gWinWidth;
	/** @var {Number} Width of all panels with pairs of toys. */
	var gPanelsTotalWidth = gPairWidth * gToysPairsCount;
	/** @var {Number} Value of `left` CSS property for the panel with all toys. */
	var gPanelPositionLeft = 0;
	/** @var {Number} Helper for timeout to hide contact form progress pane. */
	var gCloseContactFormTimeout = null;

	// -----------------------------------------------------------------------
	// Functions

	/**
	* Hide specified footer page.
	*
	* @param {DOMElement} aPageAnchor
	* @param {String} aPageId
	* @returns {void}
	*/
	function footerPageHide(aPageAnchor, aPageId) {
		// Hide page (height to zero)
		jQuery(".footer-page-" + aPageId).animate({ height: "0px" }, 500, "swing");
		// Hide footer to default state
		jQuery(".site-footer").animate({ bottom: "-410px" }, 500);
		// Update anchor of hidden page
		jQuery(aPageAnchor).removeClass("active");
		// Update opened page status
		gFooterPageStatus.isPageOpen = false;
		gFooterPageStatus.openPageId = null;
	} // end footerPageHide(aPageAnchor, aPageId)

	/**
	* Show specified footer page.
	*
	* @param {DOMElement} aPageAnchor
	* @param {String} aPageId
	* @returns {void}
	*/
	function footerPageShow(aPageAnchor, aPageId) {
		// Set correct footer position
		jQuery(".site-footer").animate({ bottom: "0px" }, 500);
		// Show page (add height)
		jQuery(".footer-page-" + aPageId).animate({ height: "400px" }, 500);
		// Update anchor
		jQuery(aPageAnchor).addClass("active");
		// Save opened page status
		gFooterPageStatus.isPageOpen = true;
		gFooterPageStatus.openPageId = aPageId;
	} // end footerPageShow(aPageAnchor, aPageId)

	/**
	* Updates visibility of buttons in toys navigation.
	*
	* @returns {void}
	*/
	function updateToysNavigationVisibility() {
		// Previous button
		if (gPanelPositionLeft == 0) {
			jQuery(".meta-nav-prev").css("display", "none");
		} else if (gPanelPositionLeft != 0) {
			jQuery(".meta-nav-prev").css("display", "block");
		}
		// Next button
		if (gPanelPositionLeft + (gPanelsTotalWidth - gPairWidth) == 0) {
			jQuery(".meta-nav-next").css("display", "none");
		} else if (gPanelPositionLeft + (gPanelsTotalWidth - gPairWidth) != 0) {
			jQuery(".meta-nav-next").css("display", "block");
		}
	} // end updateToysNavigationVisibility()

	/**
	* Move panel with the toys.
	*
	* @param {Number} aLeftPos Left position where to be panel with toys move.
	* @param {Number} aTime
	* @returns {void}
	*/
	function moveToysPanel(aLeftPos, aTime) {
		jQuery(".toys-panel").animate({ left: aLeftPos + "px" }, aTime);
	} // end moveToysPanel(aLeftPos)

	/**
	* Moves toys to left.
	*
	* @returns {void}
	*/
	function moveToysLeft() {
		if (gCurrentToysPair == 0) {
			return;
		}
		gPanelPositionLeft = gPanelPositionLeft + gPairWidth;
		moveToysPanel(gPanelPositionLeft, DEFAULT_TOYS_MOVEMENT_TIME);
		updateToysNavigationVisibility();
		gCurrentToysPair--;
		updatePriceLabels();
	} // end moveToysLeft()

	/**
	* Moves toys to right.
	*
	* @returns {void}
	*/
	function moveToysRight() {
		if (gCurrentToysPair == gToysPairsCount) {
			return;
		}
		gPanelPositionLeft = gPanelPositionLeft - gPairWidth;
		moveToysPanel(gPanelPositionLeft, DEFAULT_TOYS_MOVEMENT_TIME);
		updateToysNavigationVisibility();
		gCurrentToysPair++;
		updatePriceLabels();
	} // end moveToysRight()

	/**
	* Collects toy's data from data attributes of given HTML image element.
	*
	* @param {Object} aImgElm Image element as returned from jQuery("...") method.
	* @returns {void}
	*/
	function collectToyDataFromImg(aImgElm) {
		var data = new Object();
		data.title = "";
		data.details = "";
		data.description = "";
		if (aImgElm) {
			data.title = aImgElm.attr("data-title");
			data.details = aImgElm.attr("data-details");
			data.description = aImgElm.attr("data-description");
		}
		return data;
	} // end collectToyDataFromImg(aImgElm)

	/**
	* Updates specified price label with given data.
	*
	* @param {String} aSide String "left" or "right".
	* @param {Object} aData
	* @returns {void}
	*/
	function updatePriceLabel(aSide, aData) {
		if (aData.title == "") return;
		jQuery(".price-labels ." + aSide + "-label").css("display", "block");
		var det = (new String(aData.details)).replace(/\[BR\]/g, "<br/>");
		jQuery(".price-labels ." + aSide + "-label h2").html(aData.title);
		jQuery(".price-labels ." + aSide + "-label .details").html(det);
		jQuery(".price-labels ." + aSide + "-label .description").html(aData.description);
	} // end updatePriceLabel(aSide, aData)

	/**
	* Updates price labels according to displayed toys.
	*
	* @returns {void}
	*/
	function updatePriceLabels() {
		// Left toy
		var leftToyImg = jQuery(".toys-pair-" + gCurrentToysPair + " .panel-left img");
		if (leftToyImg.length > 0) {
			var leftToyData = collectToyDataFromImg(leftToyImg);
			updatePriceLabel("left", leftToyData);
		} else {
			jQuery(".price-labels .left-label").css("display", "none");
		}
		// Right toy
		var rightToyImg = jQuery(".toys-pair-" + gCurrentToysPair + " .panel-right img");
		if (rightToyImg.length > 0) {
			var rightToyData = collectToyDataFromImg(rightToyImg);
			updatePriceLabel("right", rightToyData);
		} else {
			jQuery(".price-labels .right-label").css("display", "none");
		}
	} // end updatePriceLabels()

	/**
	* Updates width of page elements according to browser's window size.
	*
	* @returns {void}
	*/
	function updateDimensions() {
		// TODO Toto je ted pro 1366x768, takze to ulozit do CSS a pak pridat ostatni rozliseni.
		// Set correct position for price labels
		jQuery(".price-labels .left-label").css("left", gPriceLabelPosX + "px");
		jQuery(".price-labels .right-label").css("right", gPriceLabelPosX + "px");
		// Toys panel
		jQuery(".toys-panel").css("width", gPanelsTotalWidth + "px");
		jQuery(".toys-panel .toys-pair").css("width", gPairWidth + "px");
		jQuery(".toys-panel .toys-pair .panel").css("width", Math.ceil(gPairWidth / 2) + "px");
		// Toys navigation
		jQuery(".toys-navigation").css("bottom", (Math.ceil(gWinHeight / 2) - 60) + "px");

		// Toys and rack
		console.log(gWinWidth);
		console.log(gWinHeight);
		// gWinHeight = 646 for 768 on Firefox
		var rackHeight = gWinHeight - 93; // Default (1366x768) - 553
		console.log(rackHeight);

		//jQuery(".toys-panel .toys-pair .panel img").css("height", (gWinHeight - 116) + "px");
		jQuery(".toys-panel .toys-pair .rack").css("width", gPairWidth + "px");
		jQuery(".toys-panel .toys-pair .rack").css("height", rackHeight + "px");
		jQuery(".toys-panel .toys-pair .rack .part").css("height", rackHeight + "px");
		jQuery(".toys-panel .toys-pair .rack .center").css("width", (gWinWidth - (2*180)) + "px");

		// Update navigation buttons visibility immediately
		updateToysNavigationVisibility();
	} // end updatePriceLabels()

	/**
	* Clear contact form and set-up it for use.
	*
	* @returns {void}
	*/
	function clearContactForm() {
		jQuery("#contactform").trigger('reset');
		jQuery(".progress-area").hide();
		jQuery("#form-final-message").hide();
		jQuery("#contactform").show();
	} // end clearContactForm()

	/**
	* Hide contact form.
	*
	* @returns {void}
	*/
	function hideContactForm() {
		if (gCloseContactFormTimeout != null) {
			window.clearTimeout(gCloseContactFormTimeout);
		}
		// Hide page
		footerPageHide(jQuery('a[data-pageId="kontakt"]').get(0), "kontakt");
		// Reset contact form
		clearContactForm();
	} // end hideContactForm()

	// -----------------------------------------------------------------------
	// Header

	// Show/Hide site header
	jQuery("h1.site-title a img").
	mouseenter(function() { jQuery("header.site-header").animate({ top: "0px" }, 800); }).
	mouseleave(function() { jQuery("header.site-header").animate({ top: "-60px" }, 800); });
	jQuery(".site-header .user-menu").
	mouseenter(function() { jQuery("header.site-header").animate({ top: "0px" }, 800); }).
	mouseleave(function() { jQuery("header.site-header").animate({ top: "-60px" }, 800); });

	// -----------------------------------------------------------------------
	// Footer

	// Show/hide footer
	jQuery("footer.site-footer").
	mouseenter(function() {
		if (gFooterPageStatus.isPageOpen === true) return;
		jQuery(this).animate({ bottom: "-410px" }, 800).delay(200);
	}).
	mouseleave(function() {
		if (gFooterPageStatus.isPageOpen === true) return;
		jQuery(this).delay(400).animate({ bottom: "-510px" }, 800);
	});

	// Handler for footer menuitems.
	jQuery("footer.site-footer .footer-menu a").
	click(function() {
		// ID of a requested page
		var selPageId = jQuery(this).attr("data-pageId");
		if (gFooterPageStatus.isPageOpen === true) {
			// There is already any page shown
			if (gFooterPageStatus.openPageId == selPageId) {
				// The same page as requested is shown so hide it
				footerPageHide(this, selPageId);
			} else {
				// Different page than requested is shown so hide currently shown
				var selPageAnchor = jQuery(".footer-menu a." + gFooterPageStatus.openPageId);
				footerPageHide(selPageAnchor, gFooterPageStatus.openPageId);
				// and open the new one.
				footerPageShow(this, selPageId);
			}
		} else {
			// There is no page shown so show it
			footerPageShow(this, selPageId);
		}
	});

	// -----------------------------------------------------------------------
	// Price labels

	// Showing/hiding
	jQuery(".price-labels .left-label").
	mouseenter(function() { jQuery(this).animate({ top: "-35px" }, 800).delay(200); }).
	mouseleave(function() { jQuery(this).delay(400).animate({ top: "-490px" }, 800); });
	jQuery(".price-labels .right-label").
	mouseenter(function() { jQuery(this).animate({ top: "-35px" }, 800).delay(200); }).
	mouseleave(function() { jQuery(this).delay(400).animate({ top: "-494px" }, 800); });

	// Fill the first two price labels
	updatePriceLabel("left", collectToyDataFromImg(jQuery(".toys-pair-0 .panel-left img")));
	updatePriceLabel("right", collectToyDataFromImg(jQuery(".toys-pair-0 .panel-right img")));

	// -----------------------------------------------------------------------
	// Toys navigation

	// By mouse navigation
	jQuery(".toys-navigation .left").click(moveToysLeft);
	jQuery(".toys-navigation .right").click(moveToysRight);
	// By left/right arrow keys navigation
	jQuery(document).keydown(function(aEvent) {
		if (aEvent.keyCode == 37) { moveToysLeft(); }
		if (aEvent.keyCode == 39) { moveToysRight(); }
	});

	// -----------------------------------------------------------------------
	// Anchors on "Stock" page

	// Handlers for links on "Stock" page - it hides page and
	// navigates to the correct toy.
	jQuery(".shopStockAreaInner a").click(function(event) {
		// Stop anchor onclick event
		event.preventDefault();
		event.stopPropagation();
		// Identify toys pair panel to show
		var toyId = jQuery(this).attr("data-toyId");
		var pairIndex = jQuery('img[data-toyId="' + toyId + '"]').parent().parent().attr("data-pairIndex");
		// Hide shop stock page
		footerPageHide(jQuery('a[data-pageId="skladem"]').get(0), "skladem");
		// Show correct toys pair
		if (gCurrentToysPair == pairIndex) return;
		gPanelPositionLeft = -(gPairWidth * pairIndex);
		moveToysPanel(gPanelPositionLeft, 1600);
		updateToysNavigationVisibility();
		gCurrentToysPair = pairIndex;
		updatePriceLabels();
	});

	// -----------------------------------------------------------------------
	// Contact Form

	// onSubmit event handler
	jQuery("#contactform").submit(function(event) {
			// Stop event
			event.preventDefault();
			event.stopPropagation();
			// Check validity (validity is served by HTML self)
			/*if (jQuery("#contactform-sender").val() !== "correct" ||
			jQuery("#contactform-email").val() !== "correct" ||
			jQuery("#contactform-subject").val() !== "correct" ||
			jQuery("#contactform-message").val() !== "correct") {
			// TODO Use better dialog (HTML)!
			alert("Musíte správně vyplnit všechna vstupní pole formuláře!");
		}*/
		// Get form data
		var data = jQuery(this).serialize();
		// Hide form and show progress are
		jQuery("#contactform").hide(600, function() {
			// Show progress pane instead of the form
			jQuery(".progress-area").show(function() {
				// POST request with submitted data
				var jqxhr = jQuery.
				post("contactform.php", data, function(result) {
					console.log("contactform - post - result");
					// Show result message
					jQuery("#request-result").html(result);
				}).
				fail(function() {
					// Show error message
					jQuery("#request-result").
					addClass("errorMessage").
					html("Omlouváme se, ale při odesílání formuláře nastala chyba!");
				}).
				always(function() {
					console.log("contactform - post - always");
					// Show "Pane will be closed in 10 seconds..."
					jQuery("#form-final-message").show();
					// And set timeout to close the form
					gCloseContactFormTimeout = window.setTimeout(hideContactForm, 3000);
				});
			});
		});
	});

	// Hide form progress area pane immediately
	jQuery("#form-final-message a").click(function(event) {
		// Stop anchor onclick event
		event.preventDefault();
		event.stopPropagation();
		// Hide contact form
		hideContactForm();
	});

	// -----------------------------------------------------------------------

	// Update CSS after page load
	updateDimensions();

	// and after each change of window size.
	jQuery(window).resize(function() { updateDimensions(); });

});
