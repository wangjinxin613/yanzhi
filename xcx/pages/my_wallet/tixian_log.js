const app = getApp()
Page({
	data: {
		listData: [
			
		]
	},
	onLoad: function () {
		var that = this;
	
			that.setData({
				userInfo: app.globalData.userInfo,
			})
			app.connect("tixianLog.php", { uid: app.globalData.userInfo.id }, function (e) {
				that.setData({
					listData: e
				});
			});
	
		
		setTimeout(function () {
			that.setData({
				userInfo: app.globalData.userInfo,
			})
			app.connect("tixianLog.php",{uid:app.globalData.userInfo.id},function(e){
				that.setData({
					listData:e
				});
			});
		}, 1000)
		
	},
	onPullDownRefresh: function () {
		app.login();
		this.onLoad();
		wx.stopPullDownRefresh();
	}
})