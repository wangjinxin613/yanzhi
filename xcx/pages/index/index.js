//index.js
//获取应用实例
const app = getApp()

Page({
	data: {
		motto: '赞赏看图',
		userInfo: app.globalData.userInfo,
		hasUserInfo: false,
		canIUse: wx.canIUse('button.open-type.getUserInfo'),
		imgUrls: [
			{ url: 'http://img02.tooopen.com/images/20150928/tooopen_sy_143912755726.jpg' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175866434296.jpg' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175833047715.jpg' }
		],
		isSelect1: 'active',
		isSelect2: '',
		isDisplay1: 'block',
		isDisplay2: 'hidden',
		indicatorDots: false,
		autoplay: false,
		interval: 5000,
		duration: 1000,
		data_list: {},//列表数据
		url: app.globalData.url
	},
	changeIndicatorDots: function (e) {
		this.setData({
			indicatorDots: !this.data.indicatorDots
		})
	},
	changeAutoplay: function (e) {
		this.setData({
			autoplay: !this.data.autoplay
		})
	},
	intervalChange: function (e) {
		this.setData({
			interval: e.detail.value
		})
	},
	durationChange: function (e) {
		this.setData({
			duration: e.detail.value
		})
	},
	//事件处理函数
	bindViewTap: function () {
		wx.navigateTo({
			url: '../logs/logs'
		})
	},
	//是否显示
	change_vip: function () {
		this.setData({
			isSelect1: 'no',
			isSelect2: 'active',
			isDisplay1: 'hidden',
			isDisplay2: 'block'
		});
	},
	//点击查看照片
	reward:function(e){
		var lid = e.currentTarget.dataset.lid;
		var isReward = e.currentTarget.dataset.isreward;
		var src = e.currentTarget.dataset.src;
		if(isReward == '1'){
			//已经解锁的照片集合		
			this.ylimg(e.currentTarget.dataset.id,src);
		}else{
			wx.navigateTo({
				url: '/pages/reward/index?lid='+lid,
			})
		}
		
	},
	shoutu:function(e){
		var urls = new Array();
		urls[0] = e.currentTarget.dataset.src;
		wx.previewImage({
			current: e.currentTarget.dataset.src,
			urls: urls // 需要预览的图片http链接列表
		})
		console.log(urls);
	},
	//预览照片
	ylimg: function (lid,src) {
		var that = this;
		wx.previewImage({
			current: src,
			urls: that.data.data_list[lid].imgUrl // 需要预览的图片http链接列表
		})
	},
	change_index: function () {
		this.setData({
			isSelect1: 'active',
			isSelect2: 'no',
			isDisplay1: 'block',
			isDisplay2: 'hidden'
		});
	},
	//
	/**
    * 生命周期函数--监听页面加载
    */
	onLoad: function () {

		var that = this;
		//首页列表数据
		wx.showLoading({
			title:'加载中',
			mask:true
		})
		app.getUserInfo(function (userInfo) {
			//更新数据
			that.setData({
				userInfo: userInfo
			})
			app.connect("index.php", { uid: that.data.userInfo.id }, function (e) {
				that.setData({
					data_list: e.data
				})
				wx.hideToast();
				//console.log(e);
			})
		})
		//轮播图数据
		app.connect("lunbo.php", "", function (e) {

			if (e != '') {
				that.setData({
					imgUrls: e
				})
			}

		})
		
	},
	onPullDownRefresh: function () {
		this.onLoad();
		wx.stopPullDownRefresh();
	},
	onShareAppMessage: function (options) {
		var that = this;
		return {
			title:  "你的颜值很值钱，点击进入，看看你的“颜”值多少钱！",
			path: '/pages/index/index',
			imageUrl:'http://uolol.com/img/zhuanfa.jpg'
		}
	},
	onShow:function(){
		this.onLoad();
		
	}
})
