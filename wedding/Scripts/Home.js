$(document).ready(function() {
	var frameCount = 7;
	var loadedFrames = 0;
	var changeTimeOut = 4000;
	var currentFrameIndex = 0;
	var animationTimeOut = 2000;
	var bannerAnimator = new Array();

	var animate = function() {
		if (currentFrameIndex >= frameCount - 1){
			currentFrameIndex = 0;
			while (currentFrameIndex < frameCount - 1){
				bannerAnimator[currentFrameIndex].remove();
				currentFrameIndex++;
			}
			bannerAnimator = null;
		}else {
			
			var currentBannerFrame = bannerAnimator[currentFrameIndex];
			var nextFrameIndex = currentFrameIndex + 1;
			var nextBannerFrame = bannerAnimator[nextFrameIndex];
			
			if (currentFrameIndex == frameCount)
				animationTimeOut = animationTimeOut * 4;
			
			nextBannerFrame.addClass('show').animate({opacity : 1.0}, animationTimeOut);
			currentBannerFrame.animate({opacity : 0}, animationTimeOut).removeClass('show');
			currentFrameIndex = nextFrameIndex;
			if (currentFrameIndex < frameCount)
				setTimeout(animate, changeTimeOut);
		}
	};

	var firstBannerFrame = $('#BannerAnimator0');
	firstBannerFrame.load(function(){
		while (currentFrameIndex < frameCount) {
			var bannerFrame = $('#BannerAnimator' + currentFrameIndex);

			bannerAnimator.push(bannerFrame);
			if (currentFrameIndex > 0){
				bannerFrame.animate({opacity : 0}, 0).removeClass('show');
				bannerFrame.attr('src','/wedding/Files/Images/BannerAnimationFrame'+currentFrameIndex+'.JPG')
				bannerFrame.load(function() {
					loadedFrames++;
					if (loadedFrames == frameCount) 
						setTimeout(animate, changeTimeOut);
				});
			} else 
				loadedFrames++;
			currentFrameIndex++;
		}

		currentFrameIndex = 0;
	});
});
